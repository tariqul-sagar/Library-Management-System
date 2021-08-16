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
            <h1 class="m-0">Search & Request Book</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
                <h3 class="card-title"> Search & Request Here</h3>

              </div>
              <div class="card-body" style="display: block;">

                <div class="row">
                  <div class="col-lg-6">
                    <div class="search-box">
                      <form action="" method="POST" name="s-form">
                        <input class="form-control" type="text" name="search" required="" placeholder="Search here" autocomplete="off">
                        <button class="btn btn-default" type="submit" name="s_submit">
                          <span class="fa fa-search"></span>
                        </button>
                      </form>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="search-box">
                      <form action="" method="POST" name="s-form">
                        <div class="uname1">
                          <input type="text" name="uname" class="form-control" required="" placeholder="Your username" autocomplete="off">
                        </div>
                        <div class="uname1">
                          <input class="form-control" type="text" name="bid" required="" placeholder="Enter Book ID" autocomplete="off">
                        </div>                                               
                        
                        <button class="btn btn-default" type="submit" name="s_submit1">
                          Request
                        </button>
                      </form>
                    </div>
                  </div>
                </div>

                <!-- Book Request Code Goes Here -->
                  <?php

                    if (isset($_POST['s_submit1'])) {
                      $uname  = mysqli_real_escape_string($db,$_POST['uname']);
                      $bid    = $_POST['bid'];                    
                      
                      $query = "INSERT INTO issuebook (uname, bid) VALUES('$uname','$bid')";

                      $addreq = mysqli_query($db, $query);
                      if ( $addreq ){
                        header("Location: request.php");
                      }
                      else{
                        die("MySQLi connection Failed." . mysqli_error($db));
                      }
                    }

                  ?>
                
                
                <div class="col-lg-12">                  

                    <!-- Search Button PHP Code Goes Here -->

                    <?php

                      if (isset($_POST['s_submit'])) {
                        $q = mysqli_query($db, "SELECT * FROM books WHERE b_name LIKE '%$_POST[search]%'");
                        if (mysqli_num_rows($q) == 0) { ?>
                          <span class="badge badge-danger" style="margin:25px auto;text-align: center; padding: 10px;font-size: 24px;">Sorry! No Books found. Try again.</span>
                       <?php }
                        else{ ?>
                          <!-- All User Table Start -->
                          <table class="table table-striped">
                            <thead class="thead-dark">
                              <tr>
                                <th scope="col">SL.</th>
                                <th scope="col">Book Name</th>
                                <th scope="col">Author Name</th>
                                <th scope="col">Book Id</th>
                                <th scope="col">Book Category</th>                  
                              </tr>
                            </thead>
                            <tbody>

                              <?php

                                $i = 0;
                                while( $row = mysqli_fetch_assoc( $q ) ){
                                  $id         = $row['id'];
                                  $b_name     = $row['b_name'];
                                  $b_id       = $row['b_id'];
                                  $b_cat      = $row['b_cat'];
                                  $w_name     = $row['w_name'];                           
                                  $i++;
                                  ?>

                                  <tr>
                                    <th scope="row"><?php echo $i;?></th>
                                    <td><?php echo $b_name;?></td>                          
                                    <td><?php echo $w_name;?></td>
                                    <td><?php echo $b_id;?></td>   
                                    <td><?php

                                      if ( $b_cat == 1 ) { ?>
                                        <span class="badge badge-success">CSE</span>
                                      <?php }
                                      else if ( $b_cat == 2 ) { ?>
                                        <span class="badge badge-info">EEE</span>
                                      <?php }
                                      else if ( $b_cat == 3 ) { ?>
                                        <span class="badge badge-warning">ETE</span>
                                      <?php }
                                      else if ( $b_cat == 4 ) { ?>
                                        <span class="badge badge-primary">SWE</span>
                                      <?php }
                                      else if ( $b_cat == 5 ) { ?>
                                        <span class="badge badge-secondary">BBA</span>
                                      <?php }                           
                                      else if ( $b_cat == 6 ) { ?>
                                        <span class="badge badge-dark">ENGLISH</span>
                                      <?php }
                                      else{ ?>
                                        <span class="badge badge-danger">No Category Selected.</span>
                                      <?php }

                                  ?></td>                                    
                                  </tr>
                                  

                              <?php  }

                              ?>
                              
                            </tbody>
                          </table>
                      <?php }
                      }

                    ?>
                    
                  </tbody>
                </table>
                <!-- All User Table End -->
                </div>           
               


              </div>
              <!-- /.card-body -->
            </div>
            <div class="b-btn">
              <a href="booklist.php">
                <button class="btn btn-warning" type="button">Back</button>
              </a>
              <a href="search.php" style="margin: 0 10px">
                <button class="btn btn-info">Clear</button>
              </a>
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
