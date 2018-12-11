<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Tampilkan Transaksi iBrankasku</title>

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
        <small>Tampilkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Transaksi iBrankasku</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Data Transaksi iBrankasku</li>
            </ul>
            
            <div class="tab-content ">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">100 Data iBrankasku terbaru</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Donatur</th>
                        <th>Deskripsi</th>
                        <th>Valuasi</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      
                      <tr>
                        <td>1.</td>
                        <td>12/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Bpk. Sahidi</a></td>
                        <td>Satu unit rumah di perumahan Grand Permata Jingga Blok A12, LT 160, LB 90 ( 2 lantai)  </td>
                        <td class="pull-right">900.000.000</td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxibrankasku-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxibrankasku-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>2.</td>
                        <td>13/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Ibu Indah</a></td>
                        <td>2 Unit Sepeda Motor Vario 150 D, warna hitam tahun 2017</td>
                        <td class="pull-right">36.000.000</td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxibrankasku-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxibrankasku-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>
                      
                      <tr>
                        <td>3.</td>
                        <td>13/9/2018</td>
                        <td><a href="lz-donatur-detail.php" target="_blank">Rahman Setiaji</a></td>
                        <td>10 Unit Laptop Asus ROG Core i5</td>
                        <td class="pull-right">100.000.000</td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-print"></i></a></td>
                        <td><a href="lz-trxibrankasku-detail.php"><i class="fa fa-search"></i></a></td>
                        <td><a href="lz-trxibrankasku-edit.php"><i class="fa fa-edit"></i></a></td>
                        <td><a href="lz-trxibrankasku-hapus.php"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Tanggal</th>
                        <th>Donatur</th>
                        <th>Deskripsi</th>
                        <th>Valuasi</th>
                        <th></th>
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