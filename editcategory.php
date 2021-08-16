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
            <h1 class="m-0">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Category</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <!-- Center side -->
          <?php

            if ( isset($_GET['edit']) ) {
              $the_id = $_GET['edit'];
              $query = "SELECT * FROM category WHERE id = '$the_id'";
              $all_cat = mysqli_query($db, $query);
              while ( $row = mysqli_fetch_assoc($all_cat) ) {
                $id           = $row['id'];
                $name         = $row['name'];
                $description  = $row['description'];
                $status       = $row['status'];
                ?>

          <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>

              </div>
              <div class="card-body" style="display: block;">
                <form action="" method="POST">
                  <div class="form-group">
                    <label>Category Name<span class="asteric">*</span></label>
                    <input type="text" name="name" class="form-control" required="required" autocomplete="off" value="<?php echo $name;?>">
                  </div>

                  <div class="form-group">
                    <label>Category Description</label>
                    <textarea name="desc" class="form-control" rows="5"><?php echo $description;?></textarea>
                  </div>

                  <div class="form-group">
                    <label>Category Status</label>
                    <select class="form-control" name="status">
                      <option value="1" <?php if( $status == 1 ){ echo 'selected'; }?>>Active</option>
                      <option value="0" <?php if( $status == 0 ){ echo 'selected'; }?>>Inactive</option>
                    </select>
                  </div>

                  <div class="form-group">
                    <input type="submit" name="editCat" class="btn btn-primary btn-flat" value="Update Category">
                  </div>
                </form>             
               </div>
              <!-- /.card-body -->
            </div>
          </div>
          <?php }  } 

            if ( isset($_POST['editCat']) ){
              $name     = mysqli_real_escape_string($db,$_POST['name']);
              $desc     = mysqli_real_escape_string($db,$_POST['desc']);
              $status   = $_POST['status'];

              $query = "UPDATE category SET name='$name', description='$desc', status='$status' WHERE id = '$id'";
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
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>                 
         



<?php

  include "inc/footer.php";

?>
