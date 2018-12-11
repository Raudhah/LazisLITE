<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Tambah Peruntukan Donasi</title>

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
        Jenis Peruntukan Donasi
        <small>Tambah Jenis Peruntukan Donasi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Peruntukan Donasi</li>
        <li class="active">Tambah</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Masukkan data Nama Peruntukan Donasi</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Tanda * wajib diisi </h3>
                    </div>
                    <!-- /.box-header -->

                    
                    <div class="box-body">
                        
                        <div class="form-group">
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Nama Peruntukan Donasi *
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputnamapekerjaandonatur" placeholder="Nama Peruntukan Donasi (misal : zakat, wakaf, program yatim, program Pondok Lansia, )">
                            </div>

                        </div>



                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-default btn-lg">Batal</button>
                            <button type="submit" class="btn btn-info btn-lg">Tambah Data</button>
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

</script>