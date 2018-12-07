<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Ganti Password</title>

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
        Pengguna
        <small>Ganti Password</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Pengguna</li>
        <li class="active">Ganti Password</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Masukkan data Perubahan Password</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Semua bagian wajib diisi </h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form class="form-horizontal">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputpassword" class="col-sm-2 control-label input-lg">
                                Password Lama Anda* 
                            </label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control input-lg" id="inputpasswordpengguna" placeholder="Password Lama">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputpassword" class="col-sm-2 control-label input-lg">
                                Password Baru Anda* 
                            </label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control input-lg" id="inputpasswordpengguna" placeholder="Password Baru">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="inputpassword" class="col-sm-2 control-label input-lg">
                                Ulangi Password Baru Anda* 
                            </label>

                            <div class="col-sm-10">
                                <input type="password" class="form-control input-lg" id="inputpasswordpengguna" placeholder="Password Baru (lagi)">
                            </div>
                        </div>



                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-default btn-lg">Batal</button>
                            <button type="submit" class="btn btn-info btn-lg">Ganti Password</button>
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
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>