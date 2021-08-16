<?php

  include "inc/header.php";
  include "inc/topbar.php";
  include "inc/sidebar.php";

?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Requested Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Request</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Center side -->
          <div class="col-lg-12">
            <!-- All User card Start -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Requested Book List</h3>

              </div>
              <div class="card-body" style="display: block;">
                
                <!-- All User Table Start -->
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">SL.</th>
                      <th scope="col">User Name</th>
                      <th scope="col">Book ID</th>
                      <th scope="col">Approve Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $query = "SELECT * FROM issuebook";
                      $all_req = mysqli_query($db, $query);
                      $i = 0;
                      while( $row = mysqli_fetch_assoc( $all_req ) ){
                        $id          = $row['id'];
                        $uname       = $row['uname'];
                        $bid         = $row['bid'];
                        $a_status    = $row['a_status'];                                       
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $uname;?></td>                          
                          <td><?php echo $bid;?></td>
                          <td><?php

                            if ($a_status==1) { ?>
                              <span class="badge badge-success">Approved</span>
                          <?php  }
                            else if ($a_status==2) { ?>
                              <span class="badge badge-danger">Not Approved</span>
                           <?php }
                           else{ ?>
                              <span class="badge badge-warning">Unknown</span>
                          <?php }

                          ;?></td>                 
                                                       
                        </tr>
                        

                    <?php  }

                    ?>
                    
                  </tbody>
                </table>
                <!-- All User Table End -->    


              </div>
              <!-- /.card-body -->
            </div>
            <!-- All User card End -->
          </div>
          
        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



<?php

  include "inc/footer.php";

?>
