<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Tambah Donatur</title>

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
        Donatur
        <small>Tambah Donatur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Donatur</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Masukkan data Donatur berikut</li>
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
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Nama Donatur *
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputnamadonatur" placeholder="Nama Donatur">
                            </div>

                        </div>

                        <!-- Jenis Donatur -->
                        <div class="form-group">

                            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                                Jenis Donatur*
                            </label>
                            
                            <div class="col-sm-10">
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturrutin"> Donatur Rutin
                                </label>
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturkotakinfaq"> Kotak Infaq
                                </label>
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturinsidental"> Donatur Insidental
                                </label>
                            </div>
                        </div>

                        <!-- AMil yang bertanggung Jawab -->
                        <div class="form-group">
                            <label for="inputamil" class="col-sm-2 control-label input-lg">
                                Petugas Amil* 
                            </label>

                            <div class="col-sm-10">
                                <select id="inputamil" class="form-control input-lg">
                                    <option>Akhina Firdaus Amsterdam</option>
                                    <option>Akhina Abu Rahman Al Kadiry</option>
                                    <option>Ukhti Shofiyah</option>
                                    <option>Ummu Khalid</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputnomortelepon" class="col-sm-2 control-label input-lg">
                                Nomor Telepon
                            </label>

                            <div class="col-sm-10">
                                <input type="number" class="form-control input-lg" id="inputnomortelepon" placeholder="Nomor Telepon Donatur : 08xxx">
                            </div>

                        </div>
                        
                        <div class="form-group">
                            <label for="inputalamatdonatur" class="col-sm-2 control-label input-lg">
                                Alamat Donatur
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputalamatdonatur" placeholder="Alamat">
                            </div>

                        </div>

                       

                        <div class="form-group">
                            <label for="inputtanggallahir" class="col-sm-2 control-label input-lg">
                                Tanggal Lahir
                            </label>

                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group date -->    
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputpekerjaandonatur" class="col-sm-2 control-label input-lg">
                                Pekerjaan
                            </label>

                            <div class="col-sm-10">
                                <select id="inputpekerjaandonatur" class="form-control input-lg">
                                    <option>Pegawai Negeri / BUMN</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Wiraswasta</option>
                                    <option>Dosen / Guru</option>
                                    <option>Pelajar</option>
                                    <option>Lainnya</option>
                                </select>
                            </div>

                        </div>

                        <!-- radio -->
                        <div class="form-group">

                            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                                Jenis Kelamin
                            </label>
                            
                            <div class="col-sm-10">
                                <label class="input-lg">
                                    <input type="radio" name="r3" checked> Laki-Laki
                                </label>
                                <label class="input-lg">
                                    <input type="radio" name="r3"> Perempuan
                                </label>
                                <label class="input-lg">
                                    <input type="radio" name="r3"> Tidak Disebutkan
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
    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>