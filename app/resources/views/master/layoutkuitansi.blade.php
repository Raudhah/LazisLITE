@include("master/header1")
  
    <title>@yield('appname', 'LazisLITE 2') | @yield('pagename')</title>


    @include("master/header2")
    
    @yield('headertag', "")


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
          This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
        </div>
      </div>
  
      <!-- Main content -->
      <section class="invoice">
        <!-- title row -->
        <div class="row">
          <div class="col-xs-12">
            <h2 class="page-header">  
                <!-- //.TANGGALKUITANSI ==================================== -->
                @yield('headerkuitansi')

              <small class="pull-right">
                  <!-- //.TANGGALKUITANSI ==================================== -->
                @yield('nomorkuitansi')
              
              </small>
            </h2>
          </div>
          <!-- /.col -->
        </div>
        <!-- info row -->
        <div class="row invoice-info">
          <div class="col-sm-6 invoice-col">
              @yield('kolomkiri')
          </div>
          <!-- /.col -->
          <div class="col-sm-6 invoice-col">
              @yield('kolomkanan')
          </div>
          <!-- /.col -->
        
        </div>
        <!-- /.row -->
  
        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
              @yield('rinciankuitansi')
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
        <div class="row">
          <!-- accepted payments column -->
          <div class="col-xs-6">
            
            @yield('kolombawahkiri')
          </div>
          <!-- /.col -->
          <div class="col-xs-6">
            
  
            @yield('kolombawahkanan')

          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
  
        <!-- this row will not appear when printing -->
        <div class="row no-print">
          <div class="col-xs-12">
            <button type="button" class="btn btn-default" onclick="window.print()"><i class="fa fa-print"></i> Cetak Kuitansi</a>
            </button>
            <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
              <i class="fa fa-download"></i> Download PDF
            </button>
          </div>
        </div>
      </section>
      <!-- /.content -->
      <div class="clearfix"></div>
    </div>
    <!-- /.content-wrapper -->

    @include("master/footer")