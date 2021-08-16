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
              <li class="breadcrumb-item active">Approval</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <?php

      if ( isset($_GET['edit']) ) {
        $the_user_id = $_GET['edit'];
        $query = "SELECT * FROM issuebook WHERE bid = '$the_user_id'";
        $all_b = mysqli_query($db, $query);
        while( $row = mysqli_fetch_assoc( $all_b ) ){
                  $id               = $row['id'];
                  $uname            = $row['uname'];
                  $bid              = $row['bid'];
                  $a_status         = $row['a_status'];                  
               }
               } ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-12">
            <div class="card card-primary a-box">
              <div class="card-header">
                <h3 class="card-title">Permission Panel</h3>
              </div>
              <div class="card-body col-lg-6 offset-3" style="display: block;">

                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>User Name</label>
                        <input type="text"  name="uname" class="form-control" required="" value="<?php echo $uname;?>">
                      </div>

                      <div class="form-group">
                        <label>Book Id</label>
                        <input type="text"  name="bid" class="form-control" required="" value="<?php echo $bid;?>">
                      </div>                      
                     
                     <div class="form-group">
                        <label>Approval</label>
                        <select class="form-control" name="approve" required="">
                          <option value="0" <?php if( $a_status == 0 ){ echo 'selected'; }?>>Unknown</option>
                          <option value="1" <?php if( $a_status == 1 ){ echo 'selected'; }?>>Approved</option>
                          <option value="2" <?php if( $a_status == 2 ){ echo 'selected'; }?>>Not Approved</option>                      
                        </select>
                      </div>                                          

                      <div class="form-group">
                        <input type="submit" name="proceed" class="btn btn-primary btn-flat" value="Proceed">
                      </div>

                    </form>                   

                <!-- Second Row End -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

    
    <?php 

        if (isset($_POST['proceed'])) {
          $uname          = mysqli_real_escape_string($db,$_POST['uname']);
          $bid            = mysqli_real_escape_string($db,$_POST['bid']);
          $a_status       = $_POST['a_status'];         

          $query = "UPDATE issuebook SET uname='$uname', bid = '$bid', a_status='1' WHERE bid = '$the_user_id'";

          echo $query;          
          $app = mysqli_query($db, $query);


          if ( $app ) {
            header("Location: request.php");
          }
          else{
            die("MySQLi connection Failed." . mysqli_error($db));
          }
        }

    ?>

   



<?php

  include "inc/footer.php";

?>
