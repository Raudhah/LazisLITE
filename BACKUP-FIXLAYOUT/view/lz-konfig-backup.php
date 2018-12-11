<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Backup Database</title>

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
        Backup Database LazisLITE
        <small>Simpan data LazisLITE</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Konfigurasi</li>
        <li class="active">Backup</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Lakukan Backup Database</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Klik tombol Download Database di bawah</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form class="form-horizontal">
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="inputnamalaz" class="col-sm-2 control-label">
                                Terakhir Buat Backup
                            </label>

                            <div class="col-sm-10">
                                23 Oktober 2018
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <label for="inputnamalaz" class="col-sm-2 control-label input-lg">
                                Backup
                            </label>

                            <div class="col-sm-10">
                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-donatur-tambah">
                                    <i class="fa fa-download"></i> Download Database
                                </button>
                            </div>

                        </div>



                        
                    </div>
                    <!-- /.box-body -->
                    
  
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
