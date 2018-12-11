<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Konfigurasi</title>

<?php 
    include "header2.php";
?>

    
    <?php
        include "menu/top.php";
    ?>

  </header>

    <?php
        include "menu/side.php";
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Konfigurasi LazisLITE
        <small>Atur data LazisLITE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Konfigurasi</li>
        <li class="active">Setting</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Konfigurasi ini akan muncul pada Kuitansi dan Laporan</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Tanda * wajib diisi </h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form class="form-horizontal">
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="inputnamalaz" class="col-sm-2 control-label input-lg">
                                Nama LAZ*
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputnamalaz" placeholder="Nama LAZ">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputalamatlaz" class="col-sm-2 control-label input-lg">
                                Alamat LAZ*
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputalamatlaz" placeholder="Alamat LAZ">
                            </div>

                        </div>

                        <!-- Nomor Kontak LAZ -->
                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Nomor Kontak LAZ
                            </label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control input-lg" id="inputnomortelepon" placeholder="Nomor Telepon dan atau Email">
                            </div>

                        </div>

                        <!-- Upload Logo LAZ -->
                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Upload Logo LAZ
                            </label>

                            <div class="col-sm-10">
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">File format PNG Max 200 KB.</p>
                            </div>

                        </div>

                        <!-- Upload TTD Kuitansi LAZ -->
                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Upload TTD Kuitansi
                            </label>

                            <div class="col-sm-10">
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">File format PNG Max 200 KB.</p>
                            </div>

                        </div>

                        <!-- Upload Logo LAZ -->
                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Upload Background Kuitansi
                            </label>

                            <div class="col-sm-10">
                                <input type="file" id="exampleInputFile">
                                <p class="help-block">File format PNG Max 200 KB.</p>
                            </div>

                        </div>


                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-default btn-lg">Batal</button>
                            <button type="submit" class="btn btn-info btn-lg">Simpan Konfigurasi</button>
                        </div>
                        
                    </div>
                    <!-- /.box-footer -->
                    </form>
                </div>
                <!-- /.box -->
              
            </div>
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

<?php
    include "footer.php";
?>
