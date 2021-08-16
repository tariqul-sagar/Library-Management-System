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
            <h1 class="m-0">Add Book On Database</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Add Book</h3>

              </div>
              <div class="card-body" style="display: block;">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Book Name<span class="asteric">*</span></label>
                    <input type="text" name="b_name" class="form-control" required="required" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Book ID</label>
                    <input type="text" name="b_id" class="form-control" required="required" autocomplete="off">
                  </div>                  

                  <div class="form-group">
                    <label>Author Name</label>
                    <input type="text" name="w_name" class="form-control" required="required" autocomplete="off">
                  </div>                  

                  <div class="form-group">
                    <label>Book Category</label>
                    <select class="form-control" name="b_cat">
                      <option value="0" selected>--Selct One--</option>
                      <option value="1">CSE</option>
                      <option value="2">EEE</option>
                      <option value="3">ETE</option>
                      <option value="4">SWE</option>
                      <option value="5">BBA</option>                      
                      <option value="6">ENGLISH</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="addBook" class="btn btn-primary btn-flat" value="Add">
                  </div>
                </form>

                <?php

                  if ( isset($_POST['addBook']) ){
                    $b_name         = mysqli_real_escape_string($db,$_POST['b_name']);
                    $b_id           = $_POST['b_id'];
                    $b_cat          = $_POST['b_cat'];
                    $w_name         = mysqli_real_escape_string($db,$_POST['w_name']);
                    

                    $query = "INSERT INTO books (b_name, b_id, b_cat, w_name) VALUES('$b_name', '$b_id', '$b_cat', '$w_name')";
                    $addbook = mysqli_query($db, $query);
                    
                    if ( $addbook ){
                      header("Location: booklist.php");
                    }
                    else{
                      die("MySQLi connection Failed." . mysqli_error($db));
                    }
                  }

                ?>


              </div>
              <!-- /.card-body -->
            </div>
          </div>
          
        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



<?php

  include "inc/footer.php";

?>
