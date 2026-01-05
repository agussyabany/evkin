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
$('.btn-add').on('click', function () {

    // munculkan header saat klik pertama
    if (!noPermintaan) {
        $.get('/permintaan/draft', function (res) {
            noPermintaan = res.no_permintaan
         })

        
        //'PR-'.now()->format('Ymd')
        $('#no-permintaan').text(noPermintaan);
        $('#cart-header').removeClass('d-none');
        $('#cart-empty').remove();
    }

    let id = $(this).data('id');

    // jika bahan sudah ada di cart, fokus ke qty
    if (cart[id]) {
        $('#qty-' + id).focus();
        return;
    }

    let nama   = $(this).data('nama');
    let satuan = $(this).data('satuan');
    let ukuran = $(this).data('ukuran');

    cart[id] = true;
    let stok = $(this).data('stok');
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
                       data-stok="${stok}"
                       data-last="0"
                       min="0">
            </td>
            <td>${satuan}</td>
            <td class="kg-text" id="kg-${id}">0</td>
            <td class="text-center">
                <button class="btn btn-danger btn-sm btn-remove"
                        data-id="${id}">x</button>
            </td>
        </tr>
    `;

    $('#cart-body').append(row);
    // 🔥 AJAX SIMPAN DRAFT DETAIL
    $.post('/permintaan/cart/add', {
        _token: $('meta[name="csrf-token"]').attr('content'),
        bahan_id: id,
        qty: 0,
        kg: 0
    });
});

// hitung kg saat qty berubah
$(document).on('input', '.qty-input', function () {
    let input   = $(this);
    let id = $(this).data('id');
    let ukuran = $(this).data('ukuran');
    let stok    = parseFloat(input.data('stok'));
    let qty     = parseFloat(input.val()) || 0;
    let lastQty = parseFloat(input.data('last')) || 0;

    // ❌ VALIDASI STOK
    if (qty > stok) {
        alert('Permintaan tidak boleh melebihi stok gudang utama');

        // kembalikan ke nilai sebelumnya
        input.val(lastQty);
        input.addClass('is-invalid');

        let kg = lastQty * ukuran;
        $('#kg-' + id).text(kg);
        return;
    }

    // ✅ VALID
    input.removeClass('is-invalid');
    input.data('last', qty);

    let kg = qty * ukuran;
    $('#kg-' + id).text(kg);
     // 🔥 AJAX UPDATE QTY
    $.ajax({
        url: '/permintaan/cart/update',
        type: 'PUT',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            bahan_id: id,
            qty: qty,
            kg: kg
        }
    });
});

// hapus item
$(document).on('click', '.btn-remove', function () {
    let id = $(this).data('id');
    delete cart[id];
    $('#row-' + id).remove();

    // 🔥 AJAX DELETE
    $.ajax({
        url: '/permintaan/cart/delete',
        type: 'DELETE',
        data: {
            _token: $('meta[name="csrf-token"]').attr('content'),
            bahan_id: id
        }
    });

    if (Object.keys(cart).length === 0) {
        $('#cart-body').html(`
            <tr id="cart-empty">
                <td colspan="6" class="text-center text-muted">
                    Belum ada bahan yang diminta
                </td>
            </tr>
        `);
        $('#cart-header').addClass('d-none');
        noPermintaan = null;
    }
            
});
//SUBMIT DRAFT
        $('#btn-kirim').on('click', function () {

            if (!noPermintaan) {
                alert('Belum ada bahan yang diminta');
                return;
            }

            $.post('/permintaan/submit', {
                _token: $('meta[name="csrf-token"]').attr('content'),
                no_permintaan: noPermintaan
            }, function (res) {
                alert('Permintaan berhasil diajukan');
                // 🔥 REDIRECT KE HALAMAN DATA PERMINTAAN
                window.location.href = '/dataMinta';
            });
        });       

let isSubmitting = false;

// kalau klik "Kirim Permintaan", jangan hapus draft
$('#btn-submit').on('click', function () {
    isSubmitting = true;
});

window.addEventListener('beforeunload', function (e) {

    if (window.PERMINTAAN_DRAFT_ID && !isSubmitting) {

        // Tampilkan confirm browser
        e.preventDefault();
        e.returnValue = '';

        // kirim beacon ke server untuk hapus draft
        let data = new FormData();
        data.append('_method', 'DELETE');
        data.append('_token', $('meta[name="csrf-token"]').attr('content'));

        navigator.sendBeacon(
            `/permintaan/draft/${window.PERMINTAAN_DRAFT_ID}`,
            data
        );
    }
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

        //$('#d_supplier').text(res.header.supplier ?? '-');

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
                        <td class="text-center text-info font-weight-bold">${item.real}
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
                    if (item.qty > stokGudang) {
                        tdJumlah = `
                            <td class="text-center">
                                <input type="number"
                                    class="form-control form-control-sm qty-adjust"
                                    data-detail="${item.id}"
                                    data-ukuran="${item.bahan.ukuran}"
                                    max="${stokGudang}"
                                    min="0"
                                    value="${item.qty}">
                                <small class="text-danger">
                                    Melebihi stok (${stokGudang})
                                </small>
                            </td>
                        `;
                         tdKet = `
                        <td class="text-center text-danger font-weight-bold">
                            Stok Kurang
                        </td>
                    `;
                     tdReal = `
                        <td class="text-center text-info font-weight-bold">${item.real}
                        </td>
                    `;

                    tdStokGudang = `
                        <td class="text-center text-info font-weight-bold">
                            ${stokGudang}
                        </td>
                    `;
                    } else {
                    tdJumlah = `
                        <td class="text-center">${item.qty}</td>
                    `;

                     tdReal = `
                        <td class="text-center text-info font-weight-bold">${item.real}
                        </td>
                    `;

                    tdStokGudang = `
                        <td class="text-center text-info font-weight-bold">
                            ${stokGudang}
                        </td>
                    `;
                    tdKet = `
                        <td class="text-center text-success font-weight-bold">
                        Sesuai
                        </td>
                    `;

                    
                    }

                     $('#btn-submit-kirim').prop('disabled', false);  
                }

                   
                } else {
                    // NON GUDANG (IPA, ASMEN)
                    tdJumlah = `
                        <td class="text-center">${item.qty}</td>
                    `;

                    tdKet = `
                        <td class="text-center text-info font-weight-bold">${ket}
                        </td>
                    `;

                    tdReal = `
                        <td class="text-center td-real" data-detail="${item.id}">
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

                    }

                    
                    
                }
                html += `
                    <tr data-detail-id="${item.id}" data-qty-awal="${item.qty}" data-real-awal="${item.real}">
                        <td class="text-center">${i + 1}</td>
                        <td>${item.bahan.nama_bahan}</td>
                        ${tdJumlah}
                        <td>${item.qty * item.bahan.ukuran }</td>
                        ${tdReal}
                        <td class="text-center">
                           ${item.real * item.bahan.ukuran } 
                        </td>
                        <td class="text-center">
                            <span class="kg-text">
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

                        let tdReal = $(`.td-real[data-detail="${detailId}"]`);
                        let tdKg   = tdReal.closest('tr').find('.kg-text');

                        if (kondisi === 'sesuai') {

                            // 🔁 BALIK KE TEXT
                            tdReal.html(`<span class="real-text">${realAwal}</span>`);
                            tdKg.text(realAwal * ukuran);

                        } else {

                            // 🔥 JADI INPUT NUMBER
                            tdReal.html(`
                                <input type="number"
                                    class="form-control form-control-sm input-real"
                                    data-detail="${detailId}"
                                    data-ukuran="${ukuran}"
                                    value="${realAwal}"
                                    min="0">
                            `);
                        }
                    });

                    $(document).on('input', '.input-real', function () {

                        let real   = parseFloat($(this).val()) || 0;
                        let ukuran = $(this).data('ukuran');

                        let kg = real * ukuran;

                        $(this)
                            .closest('tr')
                            .find('.kg-text')
                            .text(kg);
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

        let qtyReal = $(this).find('.input-real').length
            ? parseInt($(this).find('.input-real').val())
            : parseInt($(this).data('real-awal'));

        items.push({
            detail_id: detailId,
            kondisi: kondisi,
            qty: qtyReal
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



})