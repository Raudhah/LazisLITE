<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Transaksi iBrankasku Baru</title>

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
        Transaksi iBrankasku
        <small>Tambah Transaksi</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaksi iBrankasku</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Masukkan data iBrankasku sebagai berikut</li>
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


                        <!-- INPUT NAMA DONATUR -->
                        
                        <div class="form-group">
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Donatur 
                            </label>

                            <div class="col-sm-10">
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-donatur-cari">
                                    <i class="fa fa-search"></i> Cari Donatur
                                </button>

                                atau 

                                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#modal-donatur-tambah">
                                <i class="fa fa-plus"></i> Tambah Donatur Baru
                                </button>

                            </div>




                        <!-- MODAL CARI DONATUR -->
                        <div class="modal modal-primary fade" id="modal-donatur-cari">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Cari Donatur yang sudah Ada</h4>
                            </div>
                            <div class="modal-body">
                                <p>Masukkan bagian dari nama / alamat / nomor telepon &hellip;</p>
                                    <form class="form-inline">
                                       <div class="col-sm-10 form-group">
                                        
                                            <input type="text" class="form-control input-lg" id="inputcaridonatur" placeholder="Nama / Alamat / No. Telp.">

                                            <button type="submit" class="btn btn-default btn-lg"><i class="fa fa-search"></i>CARI</button>

                                        </div>
                                    </form>
                                        <br/><br/><br/><br/>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Tutup</button>
                                <button type="button" class="btn btn-outline">Simpan</button>
                            </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal MODAL CARI DONATUR-->




                        <div class="modal modal-success fade" id="modal-donatur-tambah">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title">Tambah Donatur</h4>
                            </div>
                            <div class="modal-body">
                                <p>Form Tambah Donatur&hellip;</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-outline">Save changes</button>
                            </div>
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                        </div>


                        <!-- INPUT NAMA DONATUR -->
                        <div class="form-group">
                            <label for="inputtanggallahir" class="col-sm-2 control-label input-lg">
                                Tanggal 
                            </label>

                            <div class="col-sm-10">
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="number" class="form-control pull-right" id="datepicker">
                                </div>
                                <!-- /.input group date -->    
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputamil" class="col-sm-2 control-label input-lg">
                                Peruntukan 
                            </label>

                            <div class="col-sm-10">
                                <select id="inputamil" class="form-control input-lg">
                                    <option>Zakat</option>
                                    <option>Infaq / Shodaqoh</option>
                                    <option>Waqaf</option>
                                    <option>Program Yatim</option>
                                </select>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="inputamil" class="col-sm-2 control-label input-lg">
                                Amil
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

                        <!-- radio -->
                        <div class="form-group">

                            <label for="detaildonasi" class="col-sm-2 control-label input-lg">
                                Detail iBrankasku
                            </label>
                            
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="5" placeholder="Masukkan detail barangnya. Bagian ini akan tercetak kuitansi. "></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group">

                            <label for="detaildonasi" class="col-sm-2 control-label input-lg">
                                Estimasi Valuasi
                            </label>
                            
                            <div class="col-sm-10">
                                <input type="text" class="form-control" rows="5" placeholder="Bagian ini TIDAK TERCETAK di Kuitansi. Dapat diisi nanti. " />
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