  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Utama</li>
      
        <li class="treeview">
          <a href="{{url('')}}/" target="_blank">
            <i class="fa fa-dashboard text-maroon"></i> <span>Halaman Utama</span>
          </a>
          <ul class="treeview-menu">
              <li><a href="{{url('')}}/dashboard"><i class="fa fa-plus"></i> Dashboard</a></li>

            </ul>
        </li>


        <!-- MENU PEKERJAAN DONATUR -->
        <li class="treeview">
          <a href="{{url('')}}#">
            <i class="fa fa-address-card text-green"></i> <span>Data Pekerjaan Donatur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="{{url('')}}/pekerjaandonatur/create"><i class="fa fa-plus"></i> Tambah Pekerjaan Donatur</a></li>
            <li><a href="{{url('')}}/pekerjaandonatur"><i class="fa fa-list"></i> Tampilkan List Pekerjaan</a></li>
          </ul>
        </li>
        <!-- / MENU PEKERJAAN DONATUR -->




        <!-- MENU AMIL -->
        <li class="treeview">
          <a href="{{url('')}}#">
            <i class="fa fa-user text-orange"></i> <span>Data Amil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="{{url('')}}/amil/create"><i class="fa fa-plus"></i> Tambah Amil</a></li>
            <li><a href="{{url('')}}/amil"><i class="fa fa-list"></i> Tampilkan Data Amil</a></li>
            <li><a href="{{url('')}}/amil/search"><i class="fa fa-search"></i> Cari Amil</a></li>
          </ul>
        </li>
        <!-- / MENU AMIL -->

        <!-- MENU PERUNTUKAN DONASI -->
        <li class="treeview">
          <a href="{{url('')}}#">
            <i class="fa fa-list text-teal"></i> <span>Data Peruntukan Donasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="{{url('')}}/peruntukandonasi/create"><i class="fa fa-plus"></i> Tambah Peruntukan Donasi</a></li>
            <li><a href="{{url('')}}/peruntukandonasi"><i class="fa fa-list"></i> Tampilkan Data Peruntukan</a></li>
          </ul>
        </li>
        <!-- / MENU PERUNTUKAN DONASI -->

        <!-- MENU USER -->
        <li class="treeview">
          <a href="{{url('')}}#">
            <i class="fa fa-lock text-white"></i> <span>Data User</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="{{url('')}}/user/create"><i class="fa fa-plus"></i> Tambah User Baru</a></li>
            <li><a href="{{url('')}}/user"><i class="fa fa-list"></i> Tampilkan List User</a></li>
          </ul>
        </li>
        <!-- / MENU USER -->


        <li><a href="{{url('')}}/panduan"><i class="fa fa-book text-red"></i> <span>Petunjuk Penggunaan</span></a></li>
        
        <li class="header">Atur Program</li>
        <li><a href="{{url('')}}/konfigurasi"><i class="fa fa-gears text-teal"></i> <span>Konfigurasi</span></a></li>
        <li><a href="{{url('')}}/konfigurasi/backup"><i class="fa fa-cubes text-teal"></i> <span>Backup Database</span></a></li>

        <li class="header">User</li>
        <li><a href="{{url('')}}/user"><i class="fa fa-key text-yellow"></i> <span>Data User</span></a></li>
        <li><a href="{{url('')}}/user/create"><i class="fa fa-key text-yellow"></i> <span>Tambah User</span></a></li>
        <li><a href="{{url('')}}/user/gantipassword"><i class="fa fa-key text-yellow"></i> <span>Ganti Password</span></a></li>
        
        @auth

        <li><a href="{{url('')}}{{ route('logout') }}"
          onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
        @endauth
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>