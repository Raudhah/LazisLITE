<?php 
    include "header1.php";
?>
  
  <title>LazisLite | Dashboard</title>

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
        <small>Tampilkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Donatur</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Data Donatur</li>
            </ul>
            
            <div class="tab-content ">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Tampilan Data Donatur</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Nomor Telepon</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td>1.</td>
                        <td>Suwondo</td>
                        <td>Lesanpuro I - 9a Malang</td>
                        <td>08167162311</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>2.</td>
                        <td>Rahmat Saputra</td>
                        <td>Dau, desa tegalweru</td>
                        <td>0852787912798731</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>3.</td>
                        <td>Mujianto </td>
                        <td>Jalan Saxophone A3, Lowokwaru</td>
                        <td>0896514161717</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>4.</td>
                        <td>Ayu Pratiwi</td>
                        <td>Jalan Kawi Atas 56, Klojen</td>
                        <td>08127654123</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>5.</td>
                        <td>Tukiman</td>
                        <td>Jl. Oro-oro dowo gang 5 no. 76a, Lowokwaru</td>
                        <td>0817123671</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>6.</td>
                        <td>Indah Cahyani</td>
                        <td>Perumahan Latansa B19, Merjosari</td>
                        <td>081945918228</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>7.</td>
                        <td>Robert Steven AlBarusseli</td>
                        <td>Kedungkandang Muharto Gang 9A, nomer 10 (samping masjid)</td>
                        <td>+14878981713123</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>8.</td>
                        <td>Ummu Gustavo</td>
                        <td>Araya Spring Hill Garden Pinus 12</td>
                        <td>+87665612531231</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>9.</td>
                        <td>Kaito Kawasaki</td>
                        <td>Jl. Kertoasri 12 A, Ketawanggede, Lowokwaru.</td>
                        <td>0871276316</td>
                        <td><a href="#"><i class="fa fa-search"></i></a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
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