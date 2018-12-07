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
        Pengguna
        <small>Tampilkan</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Pengguna</li>
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
              <li class="pull-left header"><i class="fa fa-inbox"></i>Tampilkan Data Pengguna</li>
            </ul>
            
            <div class="tab-content ">

                <div class="box">
                  <div class="box-header">
                    <h3 class="box-title">Pengguna yang Terdaftar dalam Sistem</h3>
                  </div>
                  <!-- /.box-header -->
                  <div class="box-body">
                    <table id="example2" class="table table-bordered table-hover">
                      <thead>
                      <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
                        <th></th>
                        <th></th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>

                      <tr>
                        <td>1.</td>
                        <td>Maulana Akbar</td>
                        <td>maulanakeren</td>
                        <td>Super Admin</td>
                        <td><a href="#">Reset</a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>2.</td>
                        <td>Muhajirin</td>
                        <td>muhajir</td>
                        <td>Admin</td>
                        <td><a href="#">Reset</a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>3.</td>
                        <td>Sofie Nurmala</td>
                        <td>sofiecute</td>
                        <td>Admin</td>
                        <td><a href="#">Reset</a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      <tr>
                        <td>4.</td>
                        <td>Cintya Febrianti</td>
                        <td>cintya</td>
                        <td>Admin</td>
                        <td><a href="#">Reset</a></td>
                        <td><a href="#"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#"><i class="fa fa-trash"></i></a></td>
                      </tr>

                      </tbody>
                      <tfoot>
                      <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Username</th>
                        <th>Hak Akses</th>
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