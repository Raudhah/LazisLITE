<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Cari Donatur</title>

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
        <small>Cari Donatur</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Donatur</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Cari data Donatur Berdasarkan kriteria berikut</li>
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
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Mengandung Nama ... 
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputnamadonatur" placeholder="misal : abdul / siti / umar / ...  ">
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

                        <!-- Amil penanggung jawab -->
                        <div class="form-group">
                            <label for="inputamil" class="col-sm-2 control-label input-lg">
                                Ditangani Amil ...
                            </label>

                            <div class="col-sm-10">
                                <select id="inputamil" class="form-control input-lg" row="5" multiple>
                                    <option>Akhina Firdaus Amsterdam</option>
                                    <option>Akhina Abu Rahman Al Kadiry</option>
                                    <option>Ukhti Shofiyah</option>
                                    <option>Ummu Khalid</option>
                                </select>
                                <br/>
                                <a class="btn btn-sm btn-success no-padding">Pilih semua<a> - <a class="btn btn-sm btn-warning  no-padding">Lepas Semua</a> 
                            </div>

                        </div>


                        <div class="form-group">
                            <label for="inputalamatdonatur" class="col-sm-2 control-label input-lg">
                                    Alamat di sekitar ... 
                            </label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control input-lg" id="inputalamatdonatur" placeholder="kedungkandang / turen / sawojajar / dll.. ">
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

                        <div class="form-group">
                            <label for="inputtanggallahir" class="col-sm-2 control-label input-lg">
                                Lahir Antara ... 
                            </label>

                            <div class="col-sm-10">
                                <!-- Date range -->
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="text" class="form-control" id="lahirantara">
                                    </div>
                                    <!-- /.input group -->
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputpekerjaandonatur" class="col-sm-2 control-label input-lg">
                                Pekerjaan <br/><small>(Tekan Ctrl + Klik untuk memilih beberapa)</small>
                            </label>

                            <div class="col-sm-10">
                                <select multiple id="inputpekerjaandonatur" class="form-control input-lg">
                                    <option>Pegawai Negeri / BUMN</option>
                                    <option>Karyawan Swasta</option>
                                    <option>Wiraswasta</option>
                                    <option>Dosen / Guru</option>
                                    <option>Pelajar</option>
                                    <option>Lainnya</option>
                                </select>
                                <br/>
                                <a class="btn btn-sm btn-success no-padding">Pilih semua<a> - <a class="btn btn-sm btn-warning  no-padding">Hapus Semua</a> 
                            </div>

                        </div>

                        <!-- radio -->
                        <div class="form-group">

                            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                                Cari Jenis Kelamin
                            </label>
                            
                            <div class="col-sm-10">
                                <label class="input-lg">
                                    <input type="radio" name="r3" checked> Semua Jenis Kelamin
                                </label>
                                <label class="input-lg">
                                    <input type="radio" name="r3" checked> Laki-Laki
                                </label>
                                <label class="input-lg">
                                    <input type="radio" name="r3"> Perempuan
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