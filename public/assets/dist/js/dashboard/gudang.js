$(document).ready(function() {
    let csrf = $('meta[name="csrf-token"]').attr('content');
    let ukuran = 0;
    let isManual = false;
    let idMasuk = null;


    // pilih bahan
    $('#id_bahan').on('change', function () {

        let selected = $(this).find(':selected');
        let satuan = selected.data('satuan');
        ukuran     = selected.data('ukuran');

        $('#satuan').val(satuan ?? '');
        $('#jumlah').val('');
        $('#kilo').val('');
    });

    // input kilogram
    $('#jumlah').on('input', function () {
        if (isManual) return;

        let jumlah = parseFloat($(this).val());
        if (!isNaN(jumlah) && jumlah > 0 && ukuran > 0) {
            isManual = true;
            let kilo = jumlah * ukuran;
            $('#kilo').val(kilo.toFixed(2));
            isManual = false;
        }
    });

    // 🔹 AMBIL NO TRANSAKSI SAAT MODAL DIBUKA
        $('#modalMasuk').on('shown.bs.modal', function () {
            $.get('/gudang-masuk/no-transaksi', function (res) {
                $('#no_transaksi').val(res.no_transaksi);
            });
        });

        // 🔹 TAMBAH ITEM
$('#btnTambah').click(function () {
    // ===============================
    // VALIDASI IDENTITAS TRANSAKSI
    // ===============================
    if ($('#no_transaksi').val() === '') {
        alert('ID Transaksi belum ada');
        return;
    }

    if ($('#faktur').val() === '') {
        alert('Faktur / Surat Jalan wajib diisi');
        return;
    }

    if ($('#tgl_faktur').val() === '') {
        alert('Tanggal wajib diisi');
        return;
    }

    if ($('#supplier').val() === '') {
        alert('Supplier wajib diisi');
        return;
    }

    // ===============================
    // VALIDASI BAHAN
    // ===============================
    if ($('#id_bahan').val() === '') {
        alert('Silakan pilih bahan');
        return;
    }

    if ($('#jumlah').val() === '' || $('#jumlah').val() <= 0) {
        alert('Jumlah harus diisi dan lebih dari 0');
        return;
    }

    $.post('/gudang-masuk/add-item', {
        _token: csrf,
        id_masuk: idMasuk,
        no_transaksi: $('#no_transaksi').val(),
        faktur: $('#faktur').val(),
        tglSurat: $('#tgl_faktur').val(),
        supplier: $('#supplier').val(),
        id_bahan: $('#id_bahan').val(),
        jumlah: $('#jumlah').val()
    }, function (res) {

        if (res.success) {
            idMasuk = res.id_masuk;

            $('#tblBahan').append(`
                <tr id="row${res.detail_id}">
                    <td>${$('#tblBahan tr').length + 1}</td>
                    <td>${res.nama_bahan}</td>
                    <td>${$('#jumlah').val()}</td>
                    <td>${res.satuan}</td>
                    <td>${res.total_kg}</td>
                    <td>
                        <button class="btn btn-danger btn-sm btn-hapus"
                            data-id="${res.detail_id}">
                            Hapus
                        </button>
                    </td>
                </tr>
            `);

            $('#jumlah').val('');
        }
    });
});

// EVENT HAPUS (DINAMIS)
$(document).on('click', '.btn-hapus', function () {

    let id = $(this).data('id');

    if (!confirm('Hapus bahan ini?')) return;

    $.ajax({
        url: '/gudang-masuk/item/' + id,
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function (res) {
            if (res.success) {
                $('#row' + id).remove();
                urutkanUlang();
            }
        }
    });
});

// URUT ULANG NO
function urutkanUlang() {
    $('#tblBahan tr').each(function (index) {
        $(this).find('td:first').text(index + 1);
    });
}

$('#modalMasuk').on('hide.bs.modal', function (e) {

    // hanya cek jika ada transaksi aktif
    if (idMasuk) {

        let yakin = confirm(
            'Transaksi belum difinalisasi.\nBatalkan transaksi ini?'
        );

        if (!yakin) {
            // ❌ user batal → modal TIDAK ditutup
            e.preventDefault();
            return;
        }

        // ✅ user setuju → hapus draft
        $.ajax({
            url: '/gudang-masuk/cancel/' + idMasuk,
            type: 'DELETE',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success: function () {
                // reset state
                idMasuk = null;

                // tutup modal secara manual
                $('#modalMasuk').modal('hide');

                // reload halaman jika memang perlu
                location.reload();
            }
        });
        
    }
});
$('#modalGudangMasuk').on('hidden.bs.modal', function () {

    // reset state transaksi
    idMasuk = null;

    // reset form
    $('#faktur').val('');
    $('#tgl_faktur').val('');
    $('#supplier').val('');
    $('#jumlah').val('');

    // kosongkan tabel
    $('#tblBahan').empty();

    // ambil ID transaksi baru
    $.get('/gudang-masuk/no-transaksi', function (res) {
        $('#no_transaksi').val(res.no_transaksi);
    });
});

$('#btnFinal').click(()=>{
    if(confirm('Finalisasi?')){
        $.post('/gudang-masuk/final/'+idMasuk,{_token:csrf},()=>{
            alert('Selesai');
            location.reload();
        });
    }
});

$(document).on('click', '.btn-info-trx', function () {

    let idMasuk = $(this).data('id');

    // reset
    $('#tblDetailMasuk').html(`
        <tr>
            <td colspan="5" class="text-center">Loading...</td>
        </tr>
    `);

    $.get('/gudang-masuk/detail/' + idMasuk, function (res) {

        // ===============================
        // ISI IDENTITAS TRANSAKSI
        // ===============================
        $('#d_no_transaksi').text(res.header.no_transaksi);
        $('#d_tanggal').text(res.header.created_at);
        $('#d_faktur').text(res.header.faktur ?? '-');
        $('#d_supplier').text(res.header.supplier ?? '-');

        // ===============================
        // ISI DETAIL BAHAN
        // ===============================
        let html = '';

        if (res.detail.length === 0) {
            html = `
                <tr>
                    <td colspan="5" class="text-center">Tidak ada data</td>
                </tr>
            `;
        } else {
            $.each(res.detail, function (i, item) {
                html += `
                    <tr>
                        <td class="text-center">${i + 1}</td>
                        <td>${item.bahan.nama_bahan}</td>
                        <td class="text-center">${item.jumlah}</td>
                        <td class="text-center">
                            ${item.bahan.satuan?.nama_satuan ?? '-'}
                        </td>
                        <td class="text-center">
                            ${item.jumlah * item.bahan.ukuran}
                        </td>
                    </tr>
                `;
            });
        }

        $('#tblDetailMasuk').html(html);
        $('#modalDetailMasuk').modal('show');
    });

});
//KARTU STOK
$(document).on('click', '.btn-kartu-stok', function (e) {

    e.preventDefault();

    let idBahan = $(this).data('id');

    $('#tblKartuStok').html(`
        <tr>
            <td colspan="7">
                Loading...
            </td>
        </tr>
    `);

    $.get('/stok/kartu/' + idBahan, function (res) {

        // ======================
        // HEADER
        // ======================
        $('#ks_bahan').text(res.bahan.nama_bahan);
        $('#ks_satuan').text(res.bahan.satuan.nama_satuan);
        $('#ks_stok').text(res.stok);
        $('#ks_masuk').text(res.total_masuk);
        $('#ks_keluar').text(res.total_keluar);

        let html = '';

        if (res.logs.length === 0) {

            html = `
                <tr>
                    <td colspan="7">
                        Tidak ada histori stok
                    </td>
                </tr>
            `;
        } else {

            $.each(res.logs, function (i, item) {

                html += `
                    <tr>
                        <td>${i + 1}</td>
                        <td>${item.created_at}</td>
                        <td>${item.awal}</td>
                        <td class="text-success">
                            ${item.masuk ?? 0}
                        </td>
                        <td class="text-danger">
                            ${item.keluar ?? 0}
                        </td>
                        <td class="text-info">
                            ${item.akhir}
                        </td>
                        <td>
                            ${item.user?.name ?? '-'}
                        </td>
                    </tr>
                `;
            });
        }

        $('#tblKartuStok').html(html);

        $('#modalKartuStok').modal('show');
    });
});

})