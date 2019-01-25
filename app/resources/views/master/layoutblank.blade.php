@include("master/header1")
  
    <title>@yield('appname', env('APP_NAME')) | @yield('pagename')</title>


    @include("master/header2blank")
    <div class="wrapper">
      <!-- Main content -->

      <section class="invoice">
        @yield('boxcontent')
      </section>


    </div>




@include("master/footerblank")