@include("master/header1")

  <!-- //LAYOUT KERTAS A4 UNTUK DIRECT PRINT DI CSS-->

    <title>@yield('appname', env('APP_NAME')) | @yield('pagename')</title>


  

    @include("master/header2a4")
      <!-- Main content -->
      <section class="sheet padding-5mm">

        @yield('boxcontent')

      </section>





@include("master/footerblank")