<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Laporan untuk Peruntukan</title>

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
        <small>Rekap Per-Peruntukan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Laporan</li>
        <li class="active">Rekap Peruntukan</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Tampilkan Rekap Per-Peruntukan</li>
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
                        

                        <div class="form-group">
                            <label for="inputamil" class="col-sm-2 control-label input-lg">
                                Peruntukan
                            </label>

                            <div class="col-sm-10">
                                <select multiple row="5" id="inputamil" class="form-control input-lg">
                                    <option>Zakat</option>
                                    <option>Infaq / Shodaqoh</option>
                                    <option>Waqaf</option>
                                    <option>Program A</option>
                                </select>
                                <br/>
                                <a class="btn btn-sm btn-success no-padding">Pilih semua<a> - <a class="btn btn-sm btn-warning  no-padding">Lepas Semua</a>
                            </div>

                        </div>

                        
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