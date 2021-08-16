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
            <h1 class="m-0">Update Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Update</li>
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
          <div class="col-lg-12">
            <?php

            if ( isset($_GET['edit']) ) {
              $the_user_id = $_GET['edit'];
              $query = "SELECT * FROM users WHERE id = '$the_user_id'";
              $all_user = mysqli_query($db, $query);
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
                     } ?>
                 

            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Your Profile</h3>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
                  <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Full Name<span class="asteric">*</span></label>
                        <input type="text" name="fullname" class="form-control" required="required" autocomplete="off" value="<?php echo $fullname;?>">
                      </div>

                      <div class="form-group">
                        <label>Email<span class="asteric">*</span></label>
                        <input type="email" name="email" class="form-control" required="required" autocomplete="off" value="<?php echo $email;?>">
                      </div>

                      <div class="form-group">
                        <label>Username<span class="asteric">*</span></label>
                        <input type="text" name="username" class="form-control" required="required" autocomplete="off" value="<?php echo $username;?>">
                      </div>

                      <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                          <option value="1" <?php if( $gender == 1 ){ echo 'selected'; }?>>Male</option>
                          <option value="2" <?php if( $gender == 2 ){ echo 'selected'; }?>>Female</option>                      
                        </select>
                      </div>
                     
                  </div>
                  
                  <div class="col-lg-6">
                      <div class="form-group">
                        <label>Id</label>
                        <input type="text" name="stid" class="form-control" required="required" autocomplete="off" value="<?php echo $stid;?>">
                      </div>

                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                          <option value="1" <?php if( $role == 1 ){ echo 'selected'; }?>>Student</option>
                          <option value="2" <?php if( $role == 2 ){ echo 'selected'; }?>>Teacher</option>                      
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="required" autocomplete="off" value="<?php echo $address;?>">
                      </div>                      

                      <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" name="phone" class="form-control" required="required" autocomplete="off" value="<?php echo $phone;?>">
                      </div>

                      <div class="form-group">
                        <label>Profile Picture</label><br>                        
                        <?php

                              if ( $gender == 1 ) {
                                if ( !empty($avater) ) { ?>
                                  <img src="dist/img/users/<?php echo $avater;?>" class="user-profile-update">
                              <?php  }
                                else{ ?>
                                  <img src="dist/img/users/default-male.png" class="user-profile-update">
                              <?php }
                              
                              }
                              else if ( $gender == 2 ) {
                                if ( !empty($avater) ) { ?>
                                  <img src="dist/img/users/<?php echo $avater;?>" class="user-profile-update">
                              <?php  }
                                else{ ?>
                                  <img src="dist/img/users/default-female.png" class="user-profile-update">
                              <?php }
                              
                              }
                              else{ ?>
                                  <img src="dist/img/users/default.png" class="user-profile-update">
                            <?php  } ?>
                        <input name="image" type="file">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="update" class="btn btn-primary btn-flat" value="Update">
                      </div>

                    </form>                   
                  </div>
                </div>
                <!-- Second Row End -->
              </div>         

          </div>
         <?php } ?>

        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- Update Button Code -->
    <?php
    $query = ''; 
    if ( isset($_POST['update']) ){
              $fullname         = mysqli_real_escape_string($db,$_POST['fullname']);
              $email            = mysqli_real_escape_string($db,$_POST['email']);
              $username         = mysqli_real_escape_string($db,$_POST['username']);
              $stid             = mysqli_real_escape_string($db,$_POST['stid']);
              $gender           = $_POST['gender'];
              $role             = $_POST['role'];
              $address          = mysqli_real_escape_string($db,$_POST['address']);
              $phone            = mysqli_real_escape_string($db,$_POST['phone']);
              $image            = $_FILES['image'] ['name'];

              $tmp_image        = $_FILES['image'] ['tmp_name'];

              $image_size       = $_FILES['image'] ['size'];


              if (empty($image)) {
                
                $query = "UPDATE users SET fullname = '$fullname', email = '$email', username = '$username', stid = '$stid', role = '$role', gender = '$gender', address = '$address', phone = '$phone' WHERE id = '$the_user_id'";
              }
              if (!empty($image)) {

                $random = rand(0,10000);
                $updatedimage = $random.$image;

                move_uploaded_file($tmp_image, "dist/img/users/$updatedimage");

                $query = "UPDATE users SET fullname = '$fullname', email = '$email', username = '$username', stid = '$stid', role = '$role', gender = '$gender', address = '$address', phone = '$phone', avater = '$updatedimage' WHERE id = '$the_user_id'";
              }
              $update = mysqli_query($db, $query);
                              
                 if ( $update ){
                   header("Location: allUser.php");
                 }
                 else{
                   die("MySQLi connection Failed." . mysqli_error($db));
                 }
              }             

           ?>



<?php

  include "inc/footer.php";

?>
