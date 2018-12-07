<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Tampilkan Transaksi Donasi</title>

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
        Transaksi Donasi
        <small>Tampilkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaksi Donasi</li>
        <li class="active">Tampilkan</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Tampilkan  Data Transaksi Donasi</li>
            </ul>
            
            <div class="tab-content ">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Hover Data Table</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Donatur</th>
                        <th>Peruntukan</th>
                        <th>Total Donasi</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      
                      <tr>
                        <td>1.</td>
                        <td>12/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Bpk. Suwandi</a></td>
                        <td>Infaq/Shodaqoh</td>
                        <td class="pull-right">200.000.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>2.</td>
                        <td>13/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Ibu Rohimah</a></td>
                        <td>Infaq/Shodaqoh</td>
                        <td class="pull-right">100.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>3.</td>
                        <td>13/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Rahman Setiaji</a></td>
                        <td>Waqaf</td>
                        <td class="pull-right">1.000.000.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>4.</td>
                        <td>20/10/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Bpk. Suwandi</a></td>
                        <td>Infaq/Shodaqoh</td>
                        <td class="pull-right">15.000.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>5.</td>
                        <td>21/10/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Yulia Rachmawati</a></td>
                        <td>Beasiswa Dhuafa</td>
                        <td class="pull-right">300.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>6.</td>
                        <td>22/10/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">SD Insan Permata</a></td>
                        <td>Winter Project Suriah</td>
                        <td class="pull-right">1.203.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>7.</td>
                        <td>22/10/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Andika TP</a></td>
                        <td>Zakat Maal, Program Yatim, Beasiswa</td>
                        <td class="pull-right">10.000.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>8.</td>
                        <td>12/11/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Ibu Lailatun Nahaar</a></td>
                        <td>Gerakan Lima Ribu</td>
                        <td class="pull-right">50.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>9.</td>
                        <td>14/11/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Bakso Damas Soehat</a></td>
                        <td>Program Yatim</td>
                        <td class="pull-right">190.800</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>10.</td>
                        <td>15/11/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Bpk. Sutiaji</a></td>
                        <td>Infaq Shodaqoh, Program Yatim, Program A</td>
                        <td class="pull-right">20.000.000</td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxdonasi-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxdonasi-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxdonasi-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      </tfoot>
                    </table>
                  </div>
                  <!-- /.box-body -->
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


<!-- page script -->

<?php
    include "footer.php";
?>

<script>
  $(function () {
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : true
    })
  })
</script>