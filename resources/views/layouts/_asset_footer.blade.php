

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.js') }}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('assets/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('assets/plugins/raphael/raphael.min.js')}}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('assets/plugins/chart.js/Chart.min.js') }}"></script>
<script src="{{ asset('assets/plugins/jquery-knob/jquery.knob.min.js')}}"></script>

<!-- AdminLTE for demo purposes -->
{{-- <script src="{{ asset('assets/dist/js/demo.js')}}"></script> --}}
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('assets/dist/js/pages/dashboard2.js')}}"></script>
<script src="{{ asset('assets/dist/js/utama/pp.js')}}"></script>
<script src="{{ asset('assets/dist/js/umum/keuangan.js')}}"></script>
<script src="{{ asset('assets/dist/js/pelayanan/pelayanan.js')}}"></script>
<script src="{{ asset('assets/dist/js/operasional/operasional.js')}}"></script>
<script src="{{ asset('assets/dist/js/umum/sdm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/keuangan.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/sdm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/operasional.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/pelayanan.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/home.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/ipa.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/gudang.js')}}"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

<script>
$(document).ready(function () {

    $('.masuk').DataTable({
        pageLength: 10,
        lengthMenu: [10, 25, 50, 100],
        ordering: true,
        searching: true,
        responsive: true,
        autoWidth: false,
        language: {
            search: "Cari:",
            lengthMenu: "Tampilkan _MENU_ data",
            info: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            infoEmpty: "Tidak ada data",
            zeroRecords: "Data tidak ditemukan",
            paginate: {
                previous: "‹",
                next: "›"
            }
        },
        columnDefs: [
            { orderable: false, targets: 0 } // kolom NO tidak ikut sort
        ]
    });

});
</script>


<script>
    function moveIndicator(el, index) {
      let indicator = document.getElementById('indicator');
      let links = document.querySelectorAll('.navbar a');
      links.forEach(link => link.classList.remove('active'));
      el.classList.add('active');
      indicator.style.left = `${index * 75 + 15}px`; 
    }
    // Kallkulasi Pertumbuhan Pelanggan Aspek Pelayanan
    $(document).ready(function() {

        $(document).on('click', '#tambah_pelayanan', function() {
          $.get('/lalu', function (data) {
            $('#JmlPlgnThLl').val(data.data.JmlPnddkTrlyni);
        });
      })

      $('#tahunIni').on('keyup', function () {
        var lalu = parseInt($('#JmlPlgnThLl').val()) || 0;
        var ini = parseInt($(this).val()) || 0;
        var tumbuh = ini - lalu;
        $('#kalKulasiJmlPlgn').val(tumbuh);
    });


    //NRW(Operasioanal)
    $('#JmlAirDist, #drd').on('keyup', function () {
    var distribusi = parseFloat($('#JmlAirDist').val()) || 0;
    var drd = parseFloat($('#drd').val()) || 0;
    var nrw = distribusi - drd;
    var persen = distribusi > 0 ? (nrw / distribusi) * 100 : 0;
    
    $('#nrw').val(nrw.toFixed(2));
    $('#persen').val(persen.toFixed(2)); // dibulatkan 2 angka di belakang koma

    //
    
});

function updateTotal() {
        var selectedValue = parseInt($('#adu_layan').val()) || 0; // Ganti 'yourSelectId' sesuai ID select-mu
        var aduanTeknik = parseInt($('#aduan_teknik').val()) || 0;
        var total = selectedValue + aduanTeknik;
        $('#total_aduan').val(total);
    }

    // Trigger saat select berubah
    $('#adu_layan').on('change', function() {
        updateTotal();
    });

    // Trigger saat mengetik di aduan_teknik
    $('#aduan_teknik').on('keyup', function() {
        updateTotal();
    });
    
})

//SELECT BULAN TAHUN\
function changeBulanTahun() {
    var tahun = document.getElementById('selectTahun').value;
    var bulanAwal = document.getElementById('selectBulanAwal').value;
    var bulanAkhir = document.getElementById('selectBulanAkhir').value;
    window.location.href = '?tahun=' + tahun + '&bulan_awal=' + bulanAwal + '&bulan_akhir=' + bulanAkhir;
}
</script>

