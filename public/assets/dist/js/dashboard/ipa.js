let currentPermintaanId = null;
$(document).ready(function() {
    let csrf = $('meta[name="csrf-token"]').attr('content');
        $('.cek-pompa').change(function () {
        let target = $(this).data('target');
        let table  = $('#' + target);

        if (this.checked) {
            table.slideDown(200);
        } else {
            table.slideUp(200);
            table.find('input[type="number"]').val('');
        }
    });

let cart = {};
let counter = 1;
let noPermintaan = null;


// klik tambah bahan
$('.btn-add').on('click', async function () {
    const button = $(this);

    let id = button.data('id');

    // Jika bahan sudah ada di cart, fokus ke qty
    if (cart[id]) {
        $('#qty-' + id).focus();
        return;
    }

    // Buat draft jika belum tersedia
    if (!noPermintaan) {
        try {
            const res = await $.get('/permintaan/draft');

            noPermintaan = res.no_permintaan;

            $('#no-permintaan').text(noPermintaan);
            $('#cart-header').removeClass('d-none');
            $('#cart-empty').remove();
        } catch (error) {
            alert('Gagal membuat draft permintaan. Silakan coba lagi.');
            return;
        }
    }

    let nama   = button.data('nama');
    let satuan = button.data('satuan');
    let ukuran = button.data('ukuran');

    cart[id] = true;

    let row = `
        <tr id="row-${id}">
            <td class="text-center">${counter++}</td>
            <td>${nama}</td>
            <td>
                <input type="number"
                       class="form-control form-control-sm qty-input"
                       id="qty-${id}"
                       data-id="${id}"
                       data-ukuran="${ukuran}"
                       data-last="0"
                       min="0">
            </td>
            <td>${satuan}</td>
            <td class="kg-text" id="kg-${id}">0</td>
            <td class="text-center">
                <button type="button"
                        class="btn btn-danger btn-sm btn-remove"
                        data-id="${id}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
    `;

    $('#cart-body').append(row);

    // Simpan draft detail
    $.post('/permintaan/cart/add', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        bahan_id: id,
        qty: 0,
        kg: 0
    }).fail(function () {
        alert('Gagal menambahkan bahan ke draft.');
    });
});
//....
$(document).on('input', '.qty-input', function () {
    let input = $(this);
    let id = input.data('id');
    let ukuran = parseFloat(input.data('ukuran')) || 0;
    let qty = parseFloat(input.val()) || 0;

    if (qty < 0) {
        qty = 0;
        input.val(0);
    }

    input.data('last', qty);
    input.removeClass('is-invalid');

    let kg = qty * ukuran;

    $('#kg-' + id).text(kg);

    // Simpan perubahan jumlah ke server
    $.ajax({
        url: '/permintaan/cart/update',
        type: 'PUT',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            bahan_id: id,
            qty: qty,
            kg: kg
        }
    }).fail(function () {
        console.error('Gagal memperbarui jumlah permintaan.');
    });
});

//APPROVAL

$(document).on('click', '.btn-info-minta', function () {

    currentPermintaanId = $(this).data('id');

    // reset
    $('#tblDetailMinta').html(`
        <tr>
            <td colspan="5" class="text-center">Loading...</td>
        </tr>
    `);

    $.get('/permintaan/detail/' + currentPermintaanId, function (res) {
            window.detailPermintaanCache = res.detail;
        // ===============================
        // ISI IDENTITAS TRANSAKSI
        // ===============================
        $('#m_no_transaksi').text(res.header.no_permintaan);
        $('#m_tanggal').text(res.header.created_at);
        $('#m_status').text(res.header.status_relasi.nama_status);
        $('#m_ipa').text(res.header.ipa.nama_ipa);
        // 🔥 SET ACTION FORM APPROVAL DI SINI
        $('#formApprove').attr(
            'action',
            '/permintaan/' + currentPermintaanId + '/approve'
        );
         //let statusId = res.header.status; 
        let statusId = res.header.status_relasi.id;

        console.log('STATUS ID:', statusId);
        //APPROVE ASMEN IPA
        if (statusId !== 1) {
            $('#btn-asmen-ipa')
                .prop('disabled', true)
                .removeClass('btn-outline-success')
                .addClass('btn-secondary')
                .text('DIPROSES');
        } else {
            $('#btn-asmen-ipa')
                .prop('disabled', false)
                .removeClass('btn-secondary')
                .addClass('btn-outline-success')
                .text('PROSES');
        }
        //APROVE GUDANG
        if (statusId !== 2) {
            $('#btn-asmen-gd')
                .prop('disabled', true)
                .removeClass('btn-outline-success')
                .addClass('btn-secondary')
                .text('DIPROSES');
        } else {
            $('#btn-asmen-gd')
                .prop('disabled', false)
                .removeClass('btn-secondary')
                .addClass('btn-outline-success')
                .text('PROSES');
        }

        //MUAT GUDANG
        if (statusId !== 3) {
            $('#btn-op-gd')
                .prop('disabled', true)
                .removeClass('btn-outline-success')
                .addClass('btn-secondary')
                .text('DIPROSES');
        } else {
            $('#btn-op-gd')
                .prop('disabled', false)
                .removeClass('btn-secondary')
                .addClass('btn-outline-success')
                .text('PROSES');
        }

        //KIRIM
        if (statusId !== 4) {
            $('#btn-op-gd')
                .prop('disabled', true)
                .removeClass('btn-outline-success')
                .addClass('btn-secondary')
                .text('DIPROSES');
        } else {
            $('#btn-op-gd')
                .prop('disabled', false)
                .removeClass('btn-secondary')
                .addClass('btn-outline-success')
                .text('PROSES');
        }

        

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
                let stokGudang = 0;
                let tdStokGudang = '';
                let tdJumlah = '';
                let btnCekStok = '';
                let tdKet = '';
                let tdReal = '';

                let ket = item.ket;

                    // =============================
                    // 🔥 JIKA ROLE PETUGAS GUDANG
                    // =============================
                if (window.isGudangOperator) {

                    stokGudang = item.bahan.stok_gudang
                        ? item.bahan.stok_gudang.stok
                        : 0;

                    $('.th-gudang').removeClass('d-none');
                    

                    // =============================
                    // 🔥 JIKA STATUS BUKAN(SELAIN) 3(SUDAH DISETUJUI ASMEN GUDANG) MAKA BIDANG DETAIL NORMAL
                    // =============================
                    if (statusId !=3) {
                   tdJumlah = `
                        <td class="text-center">${item.qty}</td>
                    `;

                     tdReal = `
                        <td class="text-center text-success font-weight-bold">${item.real}
                        </td>
                    `;

                    tdStokGudang = `
                        <td class="text-center text-info font-weight-bold">
                            ${stokGudang}
                        </td>
                    `;

                    $('#btn-submit-kirim').prop('disabled', true);  
                    
                } else {
                     // =============================
                    // 🔥 JIKA QTY > STOK GUDANG
                    // =============================

                    tdJumlah = `
                            <td class="text-center">
                                <input type="number"
                                    class="form-control form-control-sm qty-adjust"
                                    data-detail="${item.id}"
                                    data-ukuran="${item.bahan.ukuran}"
                                    max="${stokGudang}"
                                    min="0"
                                    value="${item.qty}">
                                
                            </td>
                        `;
                         tdKet = `
                        <td class="text-center text-default font-weight-bold">
                            -
                        </td>
                    `;
                     tdReal = `
                        <td class="text-center text-success font-weight-bold">${item.real}
                        </td>
                    `;

                    tdStokGudang = `
                        <td class="text-center text-info font-weight-bold">
                            ${stokGudang}
                        </td>
                    `;
                    if (item.qty > stokGudang) {
                        
                    } else {
                    // tdJumlah = `
                    //     <td class="text-center">${item.qty}</td>
                    // `;

                    //  tdReal = `
                    //     <td class="text-center text-success font-weight-bold">${item.real}
                    //     </td>
                    // `;

                    // tdStokGudang = `
                    //     <td class="text-center text-info font-weight-bold">
                    //         ${stokGudang}
                    //     </td>
                    // `;
                    // tdKet = `
                    //     <td class="text-center text-success font-weight-bold">
                    //     Sesuai
                    //     </td>
                    // `;

                    
                    }

                     $('#btn-submit-kirim').prop('disabled', false);  
                }

                   
                } else {
                    // NON GUDANG (IPA, ASMEN)
                    tdJumlah = `
                        <td class="text-center">${item.qty}</td>
                    `;

                    tdKet = `
                        <td class="text-center text-info font-weight-bold"><button class="btn btn-sm btn-primary btn-lihat-ket" data-detail-id="${item.id}"><i class="fa fa-eye"></i></button>
                        </td>
                    `;

                    tdReal = `
                        <td class="text-center text-success font-weight-bold td-real" data-detail="${item.id}">
                            <span class="real-text">${item.real}</span>
                        </td>
                    `;

                    $('#btn-submit-kirim').remove();
                }

                if (window.isIpaOperator) {

                    if (statusId !== 4) {

                        tdSelOpt = `
                        <td class="text-center">
                            -
                        </td>
                    `;

                    $('#btn-submit-terima-ipa').remove();
                    tdTerima = 
                        `
                        <td class="text-center text-warning font-weight-bold td-terima" data-detail="${item.id}">
                            <span class="real-text">${item.terima}</span>
                        </td>
                    `;

                    tdKlTerima = `
                        <td class="text-center text-warning font-weight-bold kg-text-terima">
                            ${item.terima * item.bahan.ukuran}
                        </td>
                    `;
                        
                    }else{

                        tdSelOpt = `
                        <td class="text-center">
                            <select class="form-control form-control-sm sel-kondisi"
                                    data-detail="${item.id}"
                                    data-real="${item.real}"
                                    data-ukuran="${item.bahan.ukuran}">
                                <option value="sesuai" selected>Sesuai</option>
                                <option value="lebih">Lebih</option>
                                <option value="kurang">Kurang</option>
                            </select>
                        </td>
                    `;

                    tdTerima = 
                        `
                        <td class="text-center td-terima text-warning font-weight-bold" data-detail="${item.id}">
                            <span class="real-text">${item.real}</span>
                        </td>
                    `;

                    tdKlTerima = `
                        <td class="text-center text-warning font-weight-bold kg-text-terima">
                            ${item.real * item.bahan.ukuran}
                        </td>
                    `;

                    }

                    



                    
                    
                }else{

                    tdTerima = `
                        <td class="text-center text-warning font-weight-bold">
                            ${item.terima}
                        </td>
                    `;

                    tdKlTerima = `
                        <td class="text-center text-warning font-weight-bold kg-text-terima">
                            ${item.terima * item.bahan.ukuran}
                        </td>
                    `;

                }
                html += `
                    <tr data-detail-id="${item.id}" data-qty-awal="${item.qty}" data-real-awal="${item.real}">
                        <td class="text-center">${i + 1}</td>
                        <td>${item.bahan.nama_bahan}</td>
                        ${tdJumlah}
                        <td><span class="kg-text">
                               ${item.bahan.ukuran} 
                            </span></td>
                        ${tdReal}
                        <td class="text-center text-success font-weight-bold">
                           ${item.real * item.bahan.ukuran } 
                        </td>

                        ${tdTerima}
                        ${tdKlTerima} 
                        

                        <td class="text-center">
                            <span class="kg-text1">
                               ${item.bahan.satuan?.nama_satuan ?? '-'} 
                            </span>
                        </td>
                        ${window.isGudangOperator ? tdStokGudang : ``}
                        ${tdKet}
                        ${window.isIpaOperator ? tdSelOpt : ``}
                    </tr>
                `;
            });
        }

        $('#tblDetailMinta').html(html);
        $('#modalDetailMinta').modal('show');
    });

                $(document).on('input', '.qty-adjust', function () {

                let qty = parseFloat($(this).val()) || 0;
                let max = parseFloat($(this).attr('max'));
                let ukuran = $(this).data('ukuran');

                // 🔒 AMANKAN JIKA LEBIH
                if (qty > max) {
                    qty = max;
                    $(this).val(max);
                }

                let kg = qty * ukuran;

                $(this)
                    .closest('tr')
                    .find('.kg-text')
                    .text(kg);
            });

            $(document).on('change', '.sel-kondisi', function () {

                        let kondisi   = $(this).val();          // sesuai | kurang | lebih
                        let detailId  = $(this).data('detail');
                        let realAwal  = $(this).data('real');
                        let ukuran    = $(this).data('ukuran');

                        let tdReal = $(`.td-terima[data-detail="${detailId}"]`);
                        let tdKg   = tdReal.closest('tr').find('.kg-text-terima');

                        if (kondisi === 'sesuai') {

                            // 🔁 BALIK KE TEXT
                            tdReal.html(`<span class="real-text">${realAwal}</span>`);
                            tdKg.text(realAwal * ukuran);

                        } else {

                            // 🔥 JADI INPUT NUMBER
                            tdReal.html(`
                                <input type="number"
                                    class="form-control form-control-sm input-terima"
                                    data-detail="${detailId}"
                                    data-ukuran="${ukuran}"
                                    value="${realAwal}"
                                    min="0">
                            `);
                        }
                    });

                    $(document).on('input', '.input-terima', function () {

                        let real   = parseFloat($(this).val()) || 0;
                        let ukuran = $(this).data('ukuran');

                        let kg = real * ukuran;

                        $(this)
                            .closest('tr')
                            .find('.kg-text-terima')
                            .text(kg);
                    });
                    // =============================
                    // 🔥 LIHAT KETERANGAN DETAIL
                    // =============================
                    function formatKeteranganByTahap(ket, detail) {
                                // tahap dari kolom `sumber`
                                // 1 = Gudang, 2 = IPA

                                // =========================
                                // GUDANG
                                // =========================
                                if (ket.sumber == 1) {
                                    const selisih = detail.qty - detail.real;

                                    if (selisih > 0) {
                                        return `Kurang ${selisih}, stok gudang kurang`;
                                    }

                                    return 'Sesuai';
                                }

                                // =========================
                                // IPA
                                // =========================
                                if (ket.sumber == 2) {
                                    const selisih = ket.qty - detail.real;

                                    if (selisih > 0) {
                                        return `Lebih ${selisih}, masuk stok IPA`;
                                    }

                                    if (selisih < 0) {
                                        return `Kurang ${Math.abs(selisih)} saat pengantaran`;
                                    }

                                    return 'Sesuai';
                                }

                                return '-';
                            }

                            function labelTahap(val) {
                                return val == 1 ? 'Gudang' : 'IPA';
                            }

                    $(document).on('click', '.btn-lihat-ket', function () {

    let detailId = $(this).data('detail-id');

    let detail = window.detailPermintaanCache.find(d => d.id == detailId);

    if (!detail) return;

    $('#ket-nama-bahan').text(detail.bahan.nama_bahan);

    let html = '';

    if (!detail.keterangans || detail.keterangans.length === 0) {
        html = `
            <tr>
                <td colspan="6" class="text-center text-muted">
                    Tidak ada keterangan
                </td>
            </tr>
        `;
    } else {

        $.each(detail.keterangans, function (i, ket) {

            const keteranganText = formatKeteranganByTahap(ket, detail);

            html += `
                <tr>
                    <td class="text-center">${i + 1}</td>

                    <td class="text-center">
                        ${labelTahap(ket.sumber)}
                    </td>

                    <td class="text-center">
                        <span class="badge badge-${
                            ket.kondisi === 'sesuai'
                                ? 'success'
                                : (ket.kondisi === 'lebih'
                                    ? 'warning'
                                    : 'danger')
                        }">
                            ${ket.kondisi.toUpperCase()}
                        </span>
                    </td>

                    <td class="text-center">${ket.qty}</td>

                    <td>${ket.user?.name ?? '-'}</td>

                    <td>
                        ${keteranganText}
                    </td>
                </tr>
            `;
        });
    }

    $('#tblKeterangan').html(html);
    $('#fieldset-keterangan').removeClass('d-none');
});
});
                    // =============================
                    // 🔥 KIRIM GUNDANG UTAMA
                    // =============================
$(document).on('click', '#btn-submit-kirim', function () {

    if (!currentPermintaanId) {
        alert('Permintaan tidak valid');
        return;
    }
    if (!confirm('Yakin proses muat & kirim barang?')) {
        return;
    }
    let items = [];

$('#tblDetailMinta tr').each(function () {

    let detailId = $(this).data('detail-id');
    if (!detailId) return; // skip header / kosong

    let qtyInput = $(this).find('.qty-adjust');
    let qtyAwal  = $(this).data('qty-awal');

    let qtyFinal = qtyInput.length
        ? parseFloat(qtyInput.val()) || 0
        : qtyAwal;

    let ket = $(this).find('.text-danger').length
        ? 'Stok Kurang'
        : null;

    items.push({
        detail_id: detailId,
        qty: qtyFinal,
        ket: ket
    });
});

$.ajax({
    url: '/permintaan/' + currentPermintaanId + '/kirim',
    type: 'POST',
    data: {
        _token: $('meta[name="csrf-token"]').attr('content'),
        items: items
    },
    success: function (res) {
        alert(res.message);

        window.open(
            '/permintaan/' + currentPermintaanId + '/surat-jalan',
            '_blank'
        );
        location.reload();
    }
});


});

                    // =============================
                    // 🔥 KIRIM GUDANG IPA
                    // =============================
$('#btn-submit-terima-ipa').on('click', function () {

    if (!confirm('Yakin terima barang ini?')) return;

    let items = [];

    $('#tblDetailMinta tr').each(function () {

        let detailId = $(this).data('detail-id');
        if (!detailId) return;

        let kondisi = $(this).find('.sel-kondisi').val();

        let qtyTerima = $(this).find('.input-terima').length
            ? parseInt($(this).find('.input-terima').val())
            : parseInt($(this).find('.td-terima .real-text').text()) || 0;

        items.push({
            detail_id: detailId,
            kondisi: kondisi,
            qty: qtyTerima
        });
    });

    $.ajax({
        url: '/permintaan/' + currentPermintaanId + '/terima-ipa',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            items: items
        },
        success: function (res) {
            alert(res.message);
            location.reload();
        }
    });
});

//BAHAN KIMIA KELUAR GUDANG IPA
$('#tambah_ipa').on('click', function () {

    let now = new Date();

    let tanggal =
        now.getFullYear().toString() +
        String(now.getMonth() + 1).padStart(2, '0') +
        String(now.getDate()).padStart(2, '0');

    let waktu =
        String(now.getHours()).padStart(2, '0') +
        String(now.getMinutes()).padStart(2, '0') +
        String(now.getSeconds()).padStart(2, '0');

    $('#no_transaksi').val(namaIpa + '-' + tanggal + '-' + waktu);

});

$(document).ready(function () {

    $('#btn-submit').on('click', function () {

        let items = [];

        $('.qty').each(function () {

            let jumlah = parseFloat($(this).val()) || 0;

            /*
             * Hanya masukkan bahan yang jumlah keluarnya > 0
             */
            if (jumlah > 0) {

                items.push({
                    id_bahan: $(this).data('id_bahan'),
                    id_satuan: $(this).data('id_satuan'),
                    jumlah: jumlah
                });

            }
        });

        /*
        |--------------------------------------------------------------------------
        | Cek apakah ada barang
        |--------------------------------------------------------------------------
        */

        if (items.length === 0) {

            alert('Belum ada bahan yang akan dikeluarkan.');

            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Generate nomor transaksi
        |--------------------------------------------------------------------------
        */

        let now = new Date();

        let tanggal =
            now.getFullYear().toString() +
            String(now.getMonth() + 1).padStart(2, '0') +
            String(now.getDate()).padStart(2, '0');

        let waktu =
            String(now.getHours()).padStart(2, '0') +
            String(now.getMinutes()).padStart(2, '0') +
            String(now.getSeconds()).padStart(2, '0');


        /*
        |--------------------------------------------------------------------------
        | ID IPA dari user login
        |--------------------------------------------------------------------------
        */

       


        let noTransaksi =
            'IPA-' +
            namaIpa +
            '-' +
            tanggal +
            '-' +
            waktu;


        /*
        |--------------------------------------------------------------------------
        | Konfirmasi
        |--------------------------------------------------------------------------
        */

        if (!confirm(
            'Yakin bahan kimia akan dikeluarkan?\n\n' +
            'No Transaksi: ' + noTransaksi
        )) {
            return;
        }


        /*
        |--------------------------------------------------------------------------
        | Disable tombol
        |--------------------------------------------------------------------------
        */

        $('#btn-submit')
            .prop('disabled', true)
            .text('MENYIMPAN...');


        /*
        |--------------------------------------------------------------------------
        | AJAX
        |--------------------------------------------------------------------------
        */

        $.ajax({

            url: "/gudang-ipa/keluar",

            type: 'POST',

            data: {

                _token: $('meta[name="csrf-token"]').attr('content'),

                no_transaksi: noTransaksi,

                items: items

            },

            success: function (res) {

                alert(res.message);

                /*
                 * Tutup modal
                 */
                $('#modalMasuk').modal('hide');

                /*
                 * Reload halaman
                 */
                location.reload();

            },

            error: function (xhr) {

                let message = 'Terjadi kesalahan.';

                if (xhr.responseJSON &&
                    xhr.responseJSON.message) {

                    message = xhr.responseJSON.message;
                }

                alert(message);

                /*
                 * Aktifkan kembali tombol
                 */
                $('#btn-submit')
                    .prop('disabled', false)
                    .text('SIMPAN');
            }

        });

    });


    /*
    |--------------------------------------------------------------------------
    | Batasi input sesuai stok
    |--------------------------------------------------------------------------
    */

    $('.qty').on('input', function () {

        let max = parseFloat($(this).attr('max')) || 0;

        let value = parseFloat($(this).val()) || 0;

        if (value > max) {

            $(this).val(max);

            alert(
                'Jumlah keluar tidak boleh melebihi stok.'
            );
        }

        if (value < 0) {

            $(this).val(0);
        }

    });

});
//Riwayat Keluar
$(document).on('click', '.btn-detail', function () {
    const noTransaksi = $(this).data('transaksi');

    $('#detail-no-transaksi').text(noTransaksi);
    $('#detail-tanggal').text('-');

    $('#tbodyDetailKeluar').html(`
        <tr>
            <td colspan="4" class="text-center">Memuat data...</td>
        </tr>
    `);

    $('#modalDetailKeluar').modal('show');

    $.ajax({
        url: '/ipa/transaksi-keluar/' +
            encodeURIComponent(noTransaksi) + '/detail',
        type: 'GET',

        success: function (res) {
            $('#detail-no-transaksi').text(
                res.transaksi.id_transaksi
            );

            $('#detail-tanggal').text(
                res.transaksi.created_at
                    ? new Date(res.transaksi.created_at)
                        .toLocaleString('id-ID')
                    : '-'
            );

            let html = '';

            if (!res.detail || res.detail.length === 0) {
                html = `
                    <tr>
                        <td colspan="4" class="text-center">
                            Tidak ada detail transaksi.
                        </td>
                    </tr>
                `;
            } else {
                $.each(res.detail, function (i, item) {
                    html += `
                        <tr>
                            <td class="text-center">${i + 1}</td>
                            <td>${item.bahan?.nama_bahan ?? '-'}</td>
                            <td class="text-right">${item.jumlah}</td>
                            <td class="text-center">
                                ${item.satuan?.nama_satuan ?? '-'}
                            </td>
                        </tr>
                    `;
                });
            }

            $('#tbodyDetailKeluar').html(html);
        },

        error: function (xhr) {
            $('#tbodyDetailKeluar').html(`
                <tr>
                    <td colspan="4" class="text-center text-danger">
                        Gagal mengambil detail transaksi.
                    </td>
                </tr>
            `);

            console.error(xhr.responseText);
        }
    });
});
//Batal Keluar
$(document).on('click', '.btn-batal', function () {
    
    const noTransaksi = $(this).data('transaksi');
    //  e.preventDefault();

    // console.log('Tombol batal diklik');
    // console.log('Nomor transaksi:', $(this).data('transaksi'));


    if (!confirm(
        'Yakin membatalkan transaksi ' + noTransaksi +
        '?\nStok IPA akan dikembalikan.'
    )) {
        return;
    }

    const tombol = $(this);

    tombol.prop('disabled', true);

    $.ajax({
        url: '/ipa/transaksi-keluar/' +
            encodeURIComponent(noTransaksi) + '/batal',
        type: 'POST',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },

        success: function (res) {
            alert(res.message);
            location.reload();
        },

        error: function (xhr) {
            const pesan = xhr.responseJSON?.message
                ?? 'Pembatalan transaksi gagal.';

            alert(pesan);
            tombol.prop('disabled', false);
        }
    });
});
//Filter Stok IPA
function filterTabelStok() {
        const pencarian = ($('#cariBahan').val() || '')
            .toLowerCase()
            .trim();

        const status = $('#filterStok').val() || '';
        let jumlahTerlihat = 0;

        $('#tabelStok tr[data-bahan]').each(function () {
            const baris = $(this);
            const namaBahan = String(baris.attr('data-bahan') || '')
                .toLowerCase();

            const statusBahan = String(baris.attr('data-status') || '');

            const cocokNama = namaBahan.includes(pencarian);
            const cocokStatus = status === '' || statusBahan === status;
            const tampil = cocokNama && cocokStatus;

            baris.toggle(tampil);

            if (tampil) {
                jumlahTerlihat++;
            }
        });

        $('#barisTidakDitemukan').toggle(jumlahTerlihat === 0);
    }

    $('#cariBahan').on('input keyup search', filterTabelStok);
    $('#filterStok').on('change', filterTabelStok);

    $('#resetFilter').on('click', function () {
        $('#cariBahan').val('');
        $('#filterStok').val('');
        filterTabelStok();
    });

    filterTabelStok();


    //kartu stok
    $(document).on('click', '.btn-kartu-stok', function () {
    const url = $(this).data('url');

    $('#isiKartuStok').html(`
        <div class="text-center p-4">
            <i class="fas fa-spinner fa-spin fa-2x"></i>
            <p class="mt-2">Memuat kartu stok...</p>
        </div>
    `);

    $('#modalKartuStok').modal('show');

    $.get(url)
        .done(function (html) {
            $('#isiKartuStok').html(html);
        })
        .fail(function (xhr) {
            $('#isiKartuStok').html(`
                <div class="alert alert-danger">
                    Gagal memuat kartu stok.
                    Periksa route, controller, dan log Laravel.
                </div>
            `);

            console.error(xhr.responseText);
        });
});

$(document).on('submit', '#formFilterKartuStok', function (e) {
    e.preventDefault();

    const url = $('.btn-kartu-stok').filter(function () {
        return $(this).data('url') === window.kartuStokUrl;
    }).data('url');

    const form = $(this);
    const idBahanUrl = $('#isiKartuStok').data('url');

    $.get(idBahanUrl, form.serialize())
        .done(function (html) {
            $('#isiKartuStok').html(html);
            $('#isiKartuStok').data('url', idBahanUrl);
        })
        .fail(function (xhr) {
            console.error(xhr.responseText);
            alert('Gagal memfilter kartu stok.');
        });
});



})
