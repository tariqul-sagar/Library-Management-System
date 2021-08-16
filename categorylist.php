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

           <div class="col-lg-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Category List</h3>

              </div>
              <div class="card-body">
                <table class="table">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">SL.</th>
                      <th scope="col">Category Name</th>
                      <th scope="col">Description</th>
                      <th scope="col">Status</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php

                      $query = "SELECT * FROM category";
                      $all_cat = mysqli_query($db, $query);
                      $i = 0;
                      while ( $row = mysqli_fetch_assoc($all_cat) ) {
                        $id           = $row['id'];
                        $name         = $row['name'];
                        $description  = $row['description'];
                        $status       = $row['status'];
                        $i++;
                        ?>

                        <tr>
                          <th scope="row"><?php echo $i; ?></th>
                          <td><?php echo $name; ?></td>
                          <td><?php echo $description; ?></td>
                          <td>
                            <?php

                              if ( $status == 1 ){ ?>
                                <span class="badge badge-success">Active</span>
                              <?php }
                              else{ ?>
                                <span class="badge badge-danger">Inactive</span>
                             <?php }

                        ?></td>
                          <td>
                            <div class="action-bar">
                              <ul>
                                <li>
                                  <a href="editcategory.php?edit=<?php echo $id;?>">
                                    <i class="fa fa-edit" data-bs-toggle="tooltip" data-bs-placement="top" title="Edit"></i>
                                  </a>
                                </li>
                                <li data-toggle="modal" data-target="#delete<?php echo $id;?>">
                                  <i class="fa fa-trash" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete"></i>
                                </li>
                              </ul>
                            </div>
                          </td>

                            <!-- Modal -->
                            <div class="modal fade" id="delete<?php echo $id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-body text-center">
                                    <h3>Are you sure to <span class="badge badge-danger">delete</span> this category?</h3>
                                    <ul>
                                      <li><a href="categorylist.php?delete=<?php echo $id;?>" class="btn btn-danger">Yes</a></li>
                                      <li><button type="button" class="btn btn-primary" class="close" data-dismiss="modal" aria-label="Close">No</button></li>
                                    </ul>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </tr>

              <?php  }
                    ?>

                  </tbody>
                </table>

              </div>
              <!-- /.card-body -->

              
            </div>
          </div>
          <div class="addbtn" style="margin: 0 auto 20px auto; border:none;background: #007bff;">
            <a href="category.php">
              <button class="btn-add btn-primary">Add More</button>
            </a>
          </div>        
        </div>          
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>



<?php

    if ( isset($_GET['delete']) ){
      $del_cat = $_GET['delete'];

      $query = "DELETE FROM category WHERE id = '$del_cat'";
      $delCat = mysqli_query($db, $query);
      
      if ( $delCat ){
        header("Location: categorylist.php");
      }
      else{
        die("MySQLi connection Failed." . mysqli_error($db));
      }
    }

  ?> 



<?php

  include "inc/footer.php";

?>
