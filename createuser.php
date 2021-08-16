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
            <h1 class="m-0">Register New User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Register</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Registration</h3>
              </div>
              <div class="card-body" style="display: block;">
                <div class="row">
                  <div class="col-lg-6">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <div class="form-group">
                        <label>Full Name<span class="asteric">*</span></label>
                        <input type="text" name="name" class="form-control" required="required" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Email<span class="asteric">*</span></label>
                        <input type="email" name="email" class="form-control" required="required" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Username<span class="asteric">*</span></label>
                        <input type="text" name="username" class="form-control" required="required" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Password<span class="asteric">*</span></label>
                        <input type="text" name="password" class="form-control" required="required" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Confirm Password<span class="asteric">*</span></label>
                        <input type="text" name="cpassword" class="form-control" required="required" autocomplete="off">
                      </div>                      
                  </div>
                  
                  <div class="col-lg-6">
                     <div class="form-group">
                        <label>Student Id<span class="asteric">*</span></label>
                        <input type="text" name="stid" class="form-control" required="required" autocomplete="off">
                      </div>
                     <div class="form-group">
                        <label>Gender</label>
                        <select class="form-control" name="gender">
                          <option selected>-- Select One --</option>
                          <option value="1">Male</option>
                          <option value="2">Female</option>                      
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="role">
                          <option selected>-- Select One --</option>
                          <option value="1">Student</option>
                          <option value="2">Teacher</option>                      
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required="required" autocomplete="off">
                      </div>                      

                      <div class="form-group">
                        <label>Phone No</label>
                        <input type="text" name="phone" class="form-control" required="required" autocomplete="off">
                      </div>

                      <div class="form-group">
                        <label>Profile Picture</label><br>
                        <input type="file" name="image" class="form-control-file">
                      </div>

                      <div class="form-group">
                        <input type="submit" name="register" class="btn btn-primary btn-flat" value="Register">
                      </div>

                    </form>                   
                  </div>
                </div>
                <!-- Second Row End -->
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>

<!-- PHP code for Registration -->

<?php
  
  $msg = '';
  $extn = array("jpg","jpeg","png"); 

  if (isset($_POST['register'])) {
    $name           = $_POST['name'];
    $email          = $_POST['email'];
    $username       = $_POST['username'];
    $password       = $_POST['password'];
    $cpassword      = $_POST['cpassword'];
    $stid           = $_POST['stid'];
    $gender         = $_POST['gender'];
    $role           = $_POST['role'];
    $address        = $_POST['address'];
    $phone          = $_POST['phone'];
    $image          = $_FILES['image'] ['name'];

    $tmp_image          = $_FILES['image'] ['tmp_name'];

    $image_size          = $_FILES['image'] ['size'];

    if (empty($image)) {
      $query = "INSERT INTO users(fullname, email, username, password, stid, role, gender, address, phone, avater, joindate) VALUES ('$name', '$email', '$username', '$hassedPass', '$stid', '$role', '$gender', '$address', '$phone','',now())";

        $register = mysqli_query($db, $query);
                      
        if ( $register ){
          header("Location: allUser.php");
        }
        else{
          die("MySQLi connection Failed." . mysqli_error($db));
        }
    }
    else{
      if ($image_size > 2097152) {
        $msg = "File size more than 2mb.";
      }

      $random = rand(0,10000);
      $updatedimage = $random.$image;

      

      $extention = strtolower(end(explode(".", $image)));

      if (in_array($extention, $extn) === false) {
        $msg = "File type donot match.";
      }
      if (!empty($msg)) {
        header("Location: createuser.php");
      }
      else{

         move_uploaded_file($tmp_image, "dist/img/users/$updatedimage");
         if ( $password == $cpassword ) {
          $hassedPass = sha1($password);

          $query = "INSERT INTO users(fullname, email, username, password, stid role, gender, address, phone, avater, joindate) VALUES ('$name', '$email', '$username', '$hassedPass', '$stid', '$role', '$gender', '$address', '$phone','$updatedimage',now())";

          $register = mysqli_query($db, $query);
                        
          if ( $register ){
            header("Location: allUser.php");
          }
          else{
            die("MySQLi connection Failed." . mysqli_error($db));
          }
        } 
      }
    }

    

  }

?>


<!-- Footer Code -->

<?php

  include "inc/footer.php";

?>


