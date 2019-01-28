@include("master/header1")
  
    <title>@yield('appname', env('APP_NAME')) | @yield('pagename')</title>


    @include("master/header2")
    
    @yield('headertag', "")


    @include("master/menu/top")

@if (auth::user()->levelakses == 1)
  @include("master/menu/side")    
@else
  @include("master/menu/sidesuperadmin")
@endif


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        @yield('modulname', env('APP_NAME'))

        <small>@yield('modulsection')</small>
      </h1>

      <!-- THIS IS THE BREADCRUMB -->
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>


    </section>


    <section class="content">

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
                <li class="pull-left header">

                    <i class="@yield('modulicon', 'fa fa-inbox')"></i>

                    @yield('boxheader-title','LazisLITE')

                </li>
            </ul>
            
            <div class="tab-content ">

              <div class="box box-info">
                
                <div class="box-header with-border">
                    <h4 class="box-title">
                      @yield('boxheader-instruction', 'Instruksi bla bla') 
                    </h4>
                </div>





                <!-- /.box-header -->
            
                <div class="box-body">

                    @yield('boxmessage')

                    @yield('boxcontent')

                </div>
                <!-- /box-body -->

                
                <div class="box-footer">

                    @yield('boxfooter')

                </div>
                <!-- /box-footer -->




              </div>
              <!-- /box box-info-->
              
            </div>

            <!-- tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->



        </section>
        <!-- /.Left col -->
        
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    @include("master/footer")