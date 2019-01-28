<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">Navigasi Utama</li>
    
      <li class="treeview">
        <a href="{{url('dashboard')}}">
          <i class="fa fa-dashboard text-maroon"></i> <span>Halaman Utama</span>
        </a>
        <ul class="treeview-menu">
            <li><a href="{{url('dashboard') }}"><i class="fa fa-plus"></i> Dashboard</a></li>

          </ul>
      </li>

      <!-- MENU TRANSAKSI DONASI -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database text-yellow"></i> <span>Transaksi Donasi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('trxdonasi/create') }}"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
          <li><a href="{{url('trxdonasi') }}"><i class="fa fa-list"></i> Tampilkan Data</a></li>
          <li><a href="{{url('trxdonasi/search') }}"><i class="fa fa-search"></i> Cari Data Donasi</a></li>
        </ul>
      </li>

      <!-- MENU TRANSAKSI IBRANKASKU -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-suitcase text-yellow"></i> <span>Transaksi iBrankasku</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('trxibrankasku/create') }}"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
          <li><a href="{{url('trxibrankasku') }}"><i class="fa fa-list"></i> Tampilkan Data</a></li>
          <li><a href="{{url('trxibrankasku/search') }}"><i class="fa fa-search"></i> Cari Data iBrankasku</a></li>
        </ul>
      </li>

      <!-- MENU TRANSAKSI KOTAK INFAQ -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-archive text-yellow"></i> <span>Transaksi Kotak Infaq</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('trxkotakinfaq/create') }}"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
          <li><a href="{{url('trxkotakinfaq') }}"><i class="fa fa-list"></i> Tampilkan Data</a></li>
          <li><a href="{{url('trxkotakinfaq/search') }}"><i class="fa fa-search"></i> Cari Data kotak Infaq</a></li>
        </ul>
      </li>

      <!-- MENU DONATUR -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-address-card text-green"></i> <span>Data Donatur</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('donatur/create') }}"><i class="fa fa-plus"></i> Tambah Donatur</a></li>
          <li><a href="{{url('donatur') }}"><i class="fa fa-list"></i> Tampilkan Donatur</a></li>
          <li><a href="{{url('donatur/search') }}"><i class="fa fa-search"></i> Cari Donatur</a></li>
        </ul>
      </li>
      <!-- / MENU DONATUR -->

      <!-- MENU LAPORAN LAPORAN -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-bar-chart text-aqua"></i> <span>Laporan-Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

        <ul class="treeview-menu">
          <li><a href="{{url('laporan/all') }}"><i class="fa fa-circle-o"></i> Laporan Semua Transaksi</a></li>
          <li><a href="{{url('laporan/amil') }}"><i class="fa fa-circle-o"></i> Laporan Berdasarkan Amil</a></li>
          <li><a href="{{url('laporan/peruntukandonasi') }}"><i class="fa fa-circle-o"></i> Rekap Per-Peruntukan</a></li>
          <li><a href="{{url('laporan/donatur') }}"><i class="fa fa-circle-o"></i> Rekap Per-Donatur</a></li>
        </ul>
      </li>
      <!-- / MENU Laporan -->

      <li><a href="{{url('panduan') }}"><i class="fa fa-book text-red"></i> <span>Petunjuk Penggunaan</span></a></li>
              <li class="header">User</li>
      <li><a href="{{url('user/gantipassword') }}"><i class="fa fa-key text-yellow"></i> <span>Ganti Password</span></a></li>
      
      @auth
          
      
      <li><a href="{{ url('logout') }}"
        onclick="event.preventDefault();document.getElementById('logout-form').submit();') }}"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
      @endauth
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>