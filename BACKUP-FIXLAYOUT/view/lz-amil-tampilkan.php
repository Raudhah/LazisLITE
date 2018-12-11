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
        Amil
        <small>Tampilkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Amil</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i> Tampilkan Data Amil</li>
            </ul>
            
            <div class="tab-content ">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Tabel data Amil</h3>
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
                        <th>Status</th>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                          
                      <tr>
                        <td>1.</td>
                        <td>Akhina Firdaus Amsterdam</td>
                        <td>Jl. Mertojoyo Selatan IVa 76</td>
                        <td>08167162311</td>
                        <td>Aktif</td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>
                          
                      <tr>
                        <td>2.</td>
                        <td>Akhina Abu Rahman al Kadiry</td>
                        <td>Perum Permata Jingga Grand, A12</td>
                        <td>089676543324</td>
                        <td>Aktif</td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>
                          
                      <tr>
                        <td>3.</td>
                        <td>Ukthi Shofiyah</td>
                        <td>Perum Sukun Permai 12A, Sukun, Malang</td>
                        <td></td>
                        <td>Aktif</td>>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>
                          
                      <tr>
                        <td>4.</td>
                        <td>Ummu Khalid</td>
                        <td></td>
                        <td>08127761237</td>
                        <td>Aktif</td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>5.</td>
                        <td>Sutrisno</td>
                        <td>Bantur</td>
                        <td>0897765443</td>
                        <td>Tidak Aktif</td>
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