<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Cari Amil</title>

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
        Amil
        <small>Cari Amil</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Amil</li>
        <li class="active">Cari</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Cari data Amil Berdasarkan kriteria berikut</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Silakan isi pada bagian yang ingin di Cari. Kosongi / biarkan pada bagian yang tidak menjadi kriteria pencarian. </h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form class="form-horizontal">
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="inputnamaamil" class="col-sm-2 control-label input-lg">
                                Mengandung Nama ... 
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputnamaamil" placeholder="misal : abdul / siti / umar / ...  ">
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputalamatamil" class="col-sm-2 control-label input-lg">
                                    Alamat di sekitar ... 
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputalamatamil" placeholder="kedungkandang / turen / sawojajar / dll.. ">
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Nomor Telepon Mengandung...
                            </label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control input-lg" id="inputnomortelepon" placeholder="Nomor Telepon 08xxx">
                            </div>

                        </div>

                        <!-- radio -->
                        <div class="form-group">

                            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                                Status Amil
                            </label>
                            
                            <div class="col-sm-10">
                            <label class="input-lg">
                                    <input type="radio" name="r3" checked> Semua Status
                                </label>

                                <label class="input-lg">
                                    <input type="radio" name="r3"> Aktif
                                </label>
                                <label class="input-lg">
                                    <input type="radio" name="r3"> Non Aktif
                                </label>
                            </div>
                        </div>

                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-default btn-lg">Batal</button>
                            <button type="submit" class="btn btn-info btn-lg">Cari Data</button>
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
<script>
    //Date range picker
    $('#lahirantara').daterangepicker()
</script>