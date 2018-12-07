<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Laporan Rekap per-Donatur</title>

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
        Laporan
        <small>Semua</small>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Tampilkan Semua Transaksi</li>
            </ul>
            
            <div class="tab-content ">
                <div class="box box-info">
                    <div class="box-header with-border">
                    <h3 class="box-title">Pilih periode pelaporan </h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form class="form-horizontal">
                    <div class="box-body">

                        <div class="form-group">
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Tampilkan Untuk
                            </label>

                            <div class="col-sm-10">

                                <div class="input-group">
                                    <button type="button" class="btn btn-default pull-right" id="daterange-btn">
                                        <span>
                                        <i class="fa fa-calendar"></i> Pilih Periode
                                        </span>
                                        <i class="fa fa-caret-down"></i>
                                    </button>
                                </div>
                            </div>

                        </div>

                        
                        <!-- Transaksi Ditampilkan -->
                        <div class="form-group">

                            <label for="jeniskelamindonatur" class="col-sm-2 control-label input-lg">
                                Jenis Transaksi
                            </label>
                            
                            <div class="col-sm-10">
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturrutin" checked> Donasi
                                </label>
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturkotakinfaq" checked> iBrankasku
                                </label>
                                <label class="input-lg">
                                    <input type="checkbox" name="isdonaturinsidental" checked> Kotak Infaq
                                </label>
                            </div>
                        </div>
                        

                        <!-- DONATURNYA -->
                        <div class="form-group">
                            <label for="inputnamadonatur" class="col-sm-2 control-label input-lg">
                                Donatur
                            </label>

                            <div class="col-sm-10 ">
                                Pilih 
                                <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-donatur-cari">
                                    <i class="fa fa-navicon"></i> SEMUA Donatur
                                </button>
                                Atau 
                                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modal-donatur-cari">
                                    <i class="fa fa-search"></i> Cari Donatur
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


                        </div>
                        <!-- /.form Group-->


 


                        
                    </div>
                    <!-- /.box-body -->
                    
                    <div class="box-footer">
                        <div class="col-sm-2">
                        </div>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-info btn-lg">Tampilkan Laporan</button>
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
    //Date range as a button
    $('#daterange-btn').daterangepicker(
      {
        ranges   : {
          'Hari Ini'       : [moment(), moment()],
          'Kemarin'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          '7 Hari terakhir' : [moment().subtract(6, 'days'), moment()],
          '30 Hari terakhir': [moment().subtract(29, 'days'), moment()],
          'Bulan INi'  : [moment().startOf('month'), moment().endOf('month')],
          'Bulan Kemarin'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate  : moment()
      },
      function (start, end) {
        $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
      }
    )

</script>