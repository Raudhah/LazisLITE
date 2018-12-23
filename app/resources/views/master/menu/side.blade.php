  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Navigasi Utama</li>
      
        <li class="treeview">
          <a href="lz-dashboard.php">
            <i class="fa fa-dashboard text-maroon"></i> <span>Halaman Utama</span>
          </a>
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
            <li><a href="lz-trxdonasi-tambah.php"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
            <li><a href="lz-trxdonasi-tampilkan.php"><i class="fa fa-list"></i> Tampilkan Data</a></li>
            <li><a href="lz-trxdonasi-cari.php"><i class="fa fa-search"></i> Cari Data Donasi</a></li>
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
            <li><a href="lz-trxibrankasku-tambah.php"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
            <li><a href="lz-trxibrankasku-tampilkan.php"><i class="fa fa-list"></i> Tampilkan Data</a></li>
            <li><a href="lz-trxibrankasku-cari.php"><i class="fa fa-search"></i> Cari Data iBrankasku</a></li>
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
            <li><a href="lz-trxkotakinfaq-tambah.php"><i class="fa fa-plus"></i> Tambah Transaksi</a></li>
            <li><a href="lz-trxkotakinfaq-tampilkan.php"><i class="fa fa-list"></i> Tampilkan Data</a></li>
            <li><a href="lz-trxkotakinfaq-cari.php"><i class="fa fa-search"></i> Cari Data kotak Infaq</a></li>
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
            <li><a href="lz-donatur-tambah.php"><i class="fa fa-plus"></i> Tambah Donatur</a></li>
            <li><a href="lz-donatur-tampilkan.php"><i class="fa fa-list"></i> Tampilkan Donatur</a></li>
            <li><a href="lz-donatur-cari.php"><i class="fa fa-search"></i> Cari Donatur</a></li>
          </ul>
        </li>
        <!-- / MENU DONATUR -->

        <!-- MENU PEKERJAAN DONATUR -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-address-card text-green"></i> <span>Data Pekerjaan Donatur</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="/pekerjaandonatur/create"><i class="fa fa-plus"></i> Tambah Pekerjaan Donatur</a></li>
            <li><a href="/pekerjaandonatur"><i class="fa fa-list"></i> Tampilkan List Pekerjaan</a></li>
          </ul>
        </li>
        <!-- / MENU PEKERJAAN DONATUR -->


        <!-- MENU AMIL -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user text-orange"></i> <span>Data Amil</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="/amil/create"><i class="fa fa-plus"></i> Tambah Amil</a></li>
            <li><a href="/amil"><i class="fa fa-list"></i> Tampilkan Data Amil</a></li>
            <li><a href="/amil/search"><i class="fa fa-search"></i> Cari Amil</a></li>
          </ul>
        </li>
        <!-- / MENU AMIL -->

        <!-- MENU PERUNTUKAN DONASI -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list text-teal"></i> <span>Data Peruntukan Donasi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="/peruntukandonasi/create"><i class="fa fa-plus"></i> Tambah Peruntukan Donasi</a></li>
            <li><a href="/peruntukandonasi"><i class="fa fa-list"></i> Tampilkan Data Peruntukan</a></li>
          </ul>
        </li>
        <!-- / MENU PERUNTUKAN DONASI -->

        <!-- MENU LAPORAN LAPORAN -->
        <li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart text-aqua"></i> <span>Laporan-Laporan</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>

          <ul class="treeview-menu">
            <li><a href="lz-laporan-trx-semua.php"><i class="fa fa-circle-o"></i> Laporan Semua Transaksi</a></li>
            <li><a href="lz-laporan-trx-rekapamil.php"><i class="fa fa-circle-o"></i> Laporan Per-Amil</a></li>
            <li><a href="lz-laporan-trx-rekapperuntukan.php"><i class="fa fa-circle-o"></i> Rekap Per-Peruntukan</a></li>
            <li><a href="lz-laporan-trx-rekapdonatur.php"><i class="fa fa-circle-o"></i> Rekap Per-Donatur</a></li>
          </ul>
        </li>
        <!-- / MENU Laporan -->

        <li><a href="https://adminlte.io/docs"><i class="fa fa-book text-red"></i> <span>Petunjuk Penggunaan</span></a></li>
        
        <li class="header">Atur Program</li>
        <li><a href="lz-konfig-konfigurasi.php"><i class="fa fa-gears text-teal"></i> <span>Konfigurasi</span></a></li>
        <li><a href="lz-konfig-backup.php"><i class="fa fa-cubes text-teal"></i> <span>Backup Database</span></a></li>

        <li class="header">User</li>
        <li><a href="lz-pengguna-gantipassword.php"><i class="fa fa-key text-yellow"></i> <span>Ganti Password</span></a></li>
        <li><a href="lz-pengguna-logout.php"><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>