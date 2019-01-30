@include("master/header1")
  
    <title>@yield('appname', env('APP_NAME')) | @yield('pagename')</title>


    @include("master/header2")
    
    @yield('headertag')


    @include("master/menu/top")


    @include("master/menu/side")


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Kuitansi
          <small>@yield('nomorkuitansi')</small>
        </h1>
      </section>
  
      <div class="pad margin no-print">
        <div class="callout callout-info" style="margin-bottom: 0!important;">
          <h4><i class="fa fa-info"></i> Note:</h4>
          Halaman ini dioptimasi untuk dapat dicetak. Klik tombol Cetak di bawah. Anda juga dapat mendownload versi PDF nya. 
        </div>
      </div>
  
      <!-- Main content -->
      @yield('kuitansi')
      <!-- /.content -->
      



      <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->

    @include("master/footer")