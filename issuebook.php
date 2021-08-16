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
            <h1 class="m-0">Approval Page</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Issue Book</li>
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
                <h3 class="card-title">Requested Books List</h3>

              </div>
              <div class="card-body" style="display: block;">
                
                

                    <?php                
                      
                      
                        $query = "SELECT users.username,stid,books.b_id,b_name,w_name,b_cat FROM users INNER JOIN issuebook ON users.username=issuebook.uname INNER JOIN books ON issuebook.bid=books.b_id WHERE issuebook.a_status=''";
                        $req_res = mysqli_query($db, $query);

                        if (mysqli_num_rows($req_res) == 0) { ?>
                          <span class="badge badge-warning" style="margin:25px auto;text-align: center; padding: 10px;font-size: 24px;">No Request for book.</span>
                      <?php  }
                      else{ ?>
                        <!-- All User Table Start -->
                        <table class="table table-striped">
                          <thead class="thead-dark">
                            <tr>
                              <th scope="col">SL.</th>
                              <th scope="col">User Name</th>
                              <th scope="col">Id</th>
                              <th scope="col">Book ID</th>
                              <th scope="col">Book Name</th>                          
                              <th scope="col">Action</th>                          
                            </tr>
                          </thead>
                          <tbody>
                            <?php
                              $i = 0;
                              while( $row = mysqli_fetch_assoc( $req_res ) ){            
                                
                                $username    = $row['username'];
                                $stid        = $row['stid'];
                                $bid         = $row['b_id'];
                                $b_name      = $row['b_name'];                         
                                $i++;
                                ?>

                                <tr>
                                  <th scope="row"><?php echo $i;?></th>
                                  <td><?php echo $username;?></td>                    
                                  <td><?php echo $stid;?></td>                    
                                  <td><?php echo $bid;?></td>
                                  <td><?php echo $b_name;?></td>
                                  <td>                                    
                                    <div class="action-bar">
                                      <ul>                                        
                                        <li>
                                          <a href="approve.php?edit=<?php echo $bid;?>">
                                            <i class="fa fa-rocket" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                          </a>
                                        </li>
                                        <li data-toggle="modal" data-target="#delete<?php echo $bid;?>">
                                          <i class="fa fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                        </li>                                  
                                      </ul>
                                    </div>
                                  </td>                   
                                </tr>
                          

                    <?php    }
                      }
                    
                    ?>
                    
                  </tbody>
                </table>
                <!-- All User Table End -->

                <!-- Delete Request Modal -->
                <!-- Modal -->
                <div class="modal fade" id="delete<?php echo $bid;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-body text-center">
                        <h3>Are you sure to <span class="badge badge-danger">delete</span> this request?</h3>
                        <ul>
                          <li><a href="issuebook.php?delete=<?php echo $bid;?>" class="btn btn-danger">Yes</a></li>
                          <li><button type="button" class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close">No</button></li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Delete Request -->

                <!-- Delete Request PHP Code -->

                <?php

                    if ( isset($_GET['delete']) ){
                      $del_user = $_GET['delete'];

                      $query = "SELECT * FROM issuebook WHERE bid = '$del_user'";
                      $result = mysqli_query($db, $query);
                      while ($row = mysqli_fetch_assoc($result)) {
                        $bid = $row['bid'];
                      }

                      $query = "DELETE FROM issuebook WHERE bid = '$del_user'";
                      $delUser = mysqli_query($db, $query);
                      
                      if ( $delUser ){
                        header("Location: issuebook.php");
                      }
                      else{
                        die("MySQLi connection Failed." . mysqli_error($db));
                      }
                    }

                  ?>    


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
