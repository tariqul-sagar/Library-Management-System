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
            <h1 class="m-0">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
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
                <h3 class="card-title">Add Category</h3>

              </div>
              <div class="card-body" style="display: block;">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Category Name<span class="asteric">*</span></label>
                    <input type="text" name="name" class="form-control" required="required" autocomplete="off">
                  </div>

                  <div class="form-group">
                    <label>Category Description</label>
                    <textarea name="desc" class="form-control" rows="5"></textarea>
                  </div>

                  <div class="form-group">
                    <label>Category Status</label>
                    <select class="form-control" name="status">
                      <option value="1" selected>Active</option>
                      <option value="0">Inactive</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="addCat" class="btn btn-primary btn-flat" value="Add New Category">
                  </div>
                </form>

                <?php

                  if ( isset($_POST['addCat']) ){
                    $name     = mysqli_real_escape_string($db,$_POST['name']);
                    $desc     = mysqli_real_escape_string($db,$_POST['desc']);
                    $status   = $_POST['status'];

                    $query = "INSERT INTO category (name, description, status) VALUES('$name', '$desc', '$status')";
                    $addCategory = mysqli_query($db, $query);
                    
                    if ( $addCategory ){
                      header("Location: categorylist.php");
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
