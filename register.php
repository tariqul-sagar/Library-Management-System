<?php
  ob_start();
  include "inc/db.php";

?>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="dist/css/custom.css">





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
                        <label>Id<span class="asteric">*</span></label>
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
      if ( $password == $cpassword ) {
          $hassedPass = sha1($password);
      $query = "INSERT INTO users(fullname, email, username, password, stid, role, gender, address, phone, avater, joindate) VALUES ('$name', '$email', '$username', '$hassedPass', '$stid', '$role', '$gender', '$address', '$phone','',now())";

        $register = mysqli_query($db, $query);
                      
        if ( $register ){
          header("Location: index.php");
        }
        else{
          die("MySQLi connection Failed." . mysqli_error($db));
        }
      }
    }
    else{
      if ($image_size > 10097152) {
        $msg = "File size more than 2mb.";
      }

      $random = rand(0,10000);
      $updatedimage = $random.$image;

      

      $extention = strtolower(end(explode(".", $image)));

      if (in_array($extention, $extn) === false) {
        $msg = "File type donot match.";
      }
      if (!empty($msg)) {
        header("Location: register.php");
      }
      else{

         move_uploaded_file($tmp_image, "dist/img/users/$updatedimage");
         if ( $password == $cpassword ) {
          $hassedPass = sha1($password);

          $query = "INSERT INTO users(fullname, email, username, password, stid, role, gender, address, phone, avater, joindate) VALUES ('$name', '$email', '$username', '$hassedPass', '$stid', '$role', '$gender', '$address', '$phone','$updatedimage',now())";

          $register = mysqli_query($db, $query);
                        
          if ( $register ){
            header("Location: index.php");
          }
          else{
            die("MySQLi connection Failed." . mysqli_error($db));
          }
        } 
      }
    }

    

  }

?>

<?php
  ob_end_flush();
?>



