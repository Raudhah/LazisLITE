<footer class="main-footer no-print">
  <div class="pull-right hidden-xs">
    <b>Version</b> Alif
  </div>
  <strong>LazisLite are Copyright &copy; 2018 <a href="https://raudhahproject.com">Raudhah Project</a>.</strong> All rights
  reserved. Themed by <a href="https://adminlte.io">AdminLTE</a> 
</footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="{{asset('js/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('js/bower_components/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
$.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('js/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{asset('js/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{asset('js/bower_components/moment/min/moment.min.js') }}"></script>
<script src="{{asset('js/bower_components/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
<!-- datepicker -->
<script src="{{asset('js/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{asset('js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}"></script>
<!-- Slimscroll -->
<script src="{{asset('js/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- FastClick -->
<script src="{{asset('js/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- DataTables -->
<script src="{{asset('js/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{asset('js/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{asset('js/dist/js/adminlte.min.js') }}"></script>

@yield('footer-code')

</body>

</html>



<!-- some footer has nasty script -->
