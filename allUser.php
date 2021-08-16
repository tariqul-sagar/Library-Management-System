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
            <h1 class="m-0">All User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All User</li>
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
                <h3 class="card-title">User Management</h3>

              </div>
              <div class="card-body" style="display: block;">
                
                <!-- All User Table Start -->
                <table class="table table-striped">
                  <thead class="thead-dark">
                    <tr>
                      <th scope="col">SL.</th>
                      <th scope="col">First Name</th>
                      <th scope="col">Profile Picture</th>
                      <th scope="col">Username</th>
                      <th scope="col">Email</th>
                      <th scope="col">Role</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $query = "SELECT * FROM users";
                      $all_user = mysqli_query($db, $query);
                      $i = 0;
                      while( $row = mysqli_fetch_assoc( $all_user ) ){
                        $id         = $row['id'];
                        $fullname   = $row['fullname'];
                        $email      = $row['email'];
                        $username   = $row['username'];
                        $password   = $row['password'];
                        $stid       = $row['stid'];
                        $role       = $row['role'];
                        $gender     = $row['gender'];
                        $address    = $row['address'];
                        $phone      = $row['phone'];
                        $avater     = $row['avater'];
                        $joindate   = $row['joindate'];
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i;?></th>
                          <td><?php echo $fullname;?></td>
                          <td>

                            <?php 


                              if ( $gender == 1 ) {
                                if ( !empty($avater) ) { ?>
                                  <img src="dist/img/users/<?php echo $avater;?>" class="user-avater">
                              <?php  }
                                else{ ?>
                                  <img src="dist/img/users/default-male.png" class="user-avater">
                              <?php }
                              
                              }
                              else if ( $gender == 2 ) {
                                if ( !empty($avater) ) { ?>
                                  <img src="dist/img/users/<?php echo $avater;?>" class="user-avater">
                              <?php  }
                                else{ ?>
                                  <img src="dist/img/users/default-female.png" class="user-avater">
                              <?php }
                              
                              }
                              else{ ?>
                                  <img src="dist/img/users/default.png" class="user-avater">
                            <?php  } ?>                             
                            
                          </td>
                          <td><?php echo $username;?></td>
                          <td><?php echo $email;?></td>  
                          <td><?php 
                            if ( $role == 0 ) { ?>
                              <span class="badge badge-primary">Super Admin</span>
                           <?php }
                            else if ( $role == 1 ) { ?>
                              <span class="badge badge-success">Student</span>
                            <?php }
                            else if ( $role == 2 ){ ?>
                              <span class="badge badge-warning">Teacher</span>
                           <?php }
                            else{ ?>
                              <span class="badge badge-danger">Suspended</span> 
                           <?php }

                        ?></td>
                          <td>
                            <?php 

                              if ($role == 0) { ?>
                                <div class="action-bar">
                                  <ul>
                                    <li data-toggle="modal" data-target="#profile<?php echo $id;?>">
                                      <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"></i>
                                    </li>                                    
                                  </ul>
                                </div>
                              <?php }
                              else{ ?>
                                <div class="action-bar">
                                  <ul>
                                    <li data-toggle="modal" data-target="#profile<?php echo $id;?>">
                                      <i class="fa fa-eye" data-bs-toggle="tooltip" data-bs-placement="top" title="View Profile"></i>
                                    </li>
                                    <li>
                                      <a href="updateUser.php?edit=<?php echo $id;?>">
                                        <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                      </a>
                                    </li>
                                    <li data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                      <i class="fa fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                    </li>
                                  </ul>
                                </div>
                            <?php  }

                            ?>
                          </td>
                          <td>

                            <!-- Delete User Modal -->
                              <!-- Modal -->
                              <div class="modal fade" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-body text-center">
                                      <h3>Are you sure to <span class="badge badge-danger">delete</span> this user?</h3>
                                      <ul>
                                        <li><a href="allUser.php?delete=<?php echo $id;?>" class="btn btn-danger">Yes</a></li>
                                        <li><button type="button" class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close">No</button></li>
                                      </ul>
                                    </div>
                                  </div>
                                </div>
                              </div>

                              <!-- Delete User Code -->

                                <?php

                                    if ( isset($_GET['delete']) ){
                                      $del_user = $_GET['delete'];

                                      $query = "SELECT * FROM users WHERE id = '$del_user'";
                                      $result = mysqli_query($db, $query);
                                      while ($row = mysqli_fetch_assoc($result)) {
                                        $img = $row['avater'];
                                      }
                                      unlink("dist/img/users/$img");

                                      $query = "DELETE FROM users WHERE id = '$del_user'";
                                      $delUser = mysqli_query($db, $query);
                                      
                                      if ( $delUser ){
                                        header("Location: allUser.php");
                                      }
                                      else{
                                        die("MySQLi connection Failed." . mysqli_error($db));
                                      }
                                    }

                                  ?>

                          <!--User Profile View Modal Start -->
                          <div class="modal fade" id="profile<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-body modal-profile">
                                  <div class="container">
                                    <div class="row">
                                      <div class="col-lg-12">

                                        <?php

                                          if ( $gender == 1 ) {
                                            if ( !empty($avater) ) { ?>
                                              <img src="dist/img/users/<?php echo $avater;?>" class="user-profile-avater">
                                          <?php  }
                                            else{ ?>
                                              <img src="dist/img/users/default-male.png" class="user-profile-avater">
                                          <?php }
                                          
                                          }
                                          else if ( $gender == 2 ) {
                                            if ( !empty($avater) ) { ?>
                                              <img src="dist/img/users/<?php echo $avater;?>" class="user-profile-avater">
                                          <?php  }
                                            else{ ?>
                                              <img src="dist/img/users/default-female.png" class="user-profile-avater">
                                          <?php }
                                          
                                          }
                                          else{ ?>
                                              <img src="dist/img/users/default.png" class="user-profile-avater">
                                        <?php  } ?>

                                        <h2 class="user-name"><?php echo $fullname;?></h2>
                                        <table class="table table-striped modal-table">
                                          <tbody>
                                            <tr>
                                              <th scope="col">User Name</th>
                                              <td>:</td>
                                              <td><?php echo $username;?></td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Email</th>
                                              <td>:</td>
                                              <td><?php echo $email;?></td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Id</th>
                                              <td>:</td>
                                              <td><?php echo $stid;?></td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Role</th>
                                              <td>:</td>
                                              <td>
                                                <?php 
                                                  if ( $role == 0 ) { ?>
                                                    <span class="badge badge-primary">Super Admin</span>
                                                 <?php }
                                                  else if ( $role == 1 ) { ?>
                                                    <span class="badge badge-success">Student</span>
                                                  <?php }
                                                  else if ( $role == 2 ){ ?>
                                                    <span class="badge badge-warning">Teacher</span>
                                                 <?php }
                                                  else{ ?>
                                                    <span class="badge badge-danger">Suspended</span> 
                                                 <?php }

                                              ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Gender</th>
                                              <td>:</td>
                                              <td>
                                                <?php 

                                                  if ( $gender == 1 ) { ?>
                                                    <span class="badge badge-info">Male</span>
                                                 <?php }
                                                  else if( $gender == 2 ){ ?>
                                                    <span class="badge badge-info">Female</span>
                                                 <?php }
                                                  else{ ?>
                                                    <span class="badge badge-info">Others</span>
                                                <?php  }

                                              ?>
                                              </td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Address</th>
                                              <td>:</td>
                                              <td><?php echo $address;?></td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Phone No</th>
                                              <td>:</td>
                                              <td><?php echo $phone;?></td>
                                            </tr>
                                            <tr>
                                              <th scope="col">Join Date</th>
                                              <td>:</td>
                                              <td><?php echo $joindate;?></td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary ok-btn" class="close" data-dismiss="modal" aria-label="Close">OK</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- User Profile View Modal End -->

                         </td>
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
