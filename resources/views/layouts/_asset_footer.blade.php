

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
<script>
    function moveIndicator(el, index) {
      let indicator = document.getElementById('indicator');
      let links = document.querySelectorAll('.navbar a');
      links.forEach(link => link.classList.remove('active'));
      el.classList.add('active');
      indicator.style.left = `${index * 75 + 15}px`; 
    }

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
    
    })
  </script>
{{-- 




<script src="{{ asset('assets/dist/js/dashboard/adm.js')}}"></script>
<script src="{{ asset('assets/dist/js/dashboard/fungsi.js')}}"></script> --}}

