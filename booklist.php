<?php

  include "inc/header.php";
  include "inc/sidebar.php";

?>

 <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img src="dist/img/logo.jpg" alt="LibraryLogo" height="300" width="300">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="dashboard.php" class="nav-link">Home</a>
      </li>
    </ul>    

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
    	<a href="search.php" style="margin: 0 15px">
        <button type="button" class="btn btn-warning">Request</button>
      </a>

      <a href="search.php" style="margin: 0 15px">
        <button type="button" class="btn btn-info">Search</button>
      </a>

      <!-- Log Out Button -->
      <a href="logout.php">
        <button class="btn btn-danger">LOG OUT</button>
      </a>

          
     
    </ul>    
  </nav>
  
  <!-- /.navbar -->







  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Book List</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">All Book</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    

    <div class="content">
    	<div class="container-fluid">
    		<div class="row">
    			<div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box bg-success">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $c = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 1) {
		                        	$c++;
		                        }
		                       }
		                       echo $c; 
		                        ?>
		                        	
		                </h3>

		                <p>CSE Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>
		          <div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box bg-info">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $e = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 2) {
		                        	$e++;
		                        }
		                       }
		                       echo $e; 
		                        ?>
		              	
		              </h3>

		                <p>EEE Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>
		          <div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box bg-warning">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $ete = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 3) {
		                        	$ete++;
		                        }
		                       }
		                       echo $ete; 
		                        ?>
		              	
		              </h3>

		                <p>ETE Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>		          
		          <div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box badge-primary">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $s = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 4) {
		                        	$s++;
		                        }
		                       }
		                       echo $s; 
		                        ?>
		              	
		              </h3>

		                <p>SWE Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>
		          <div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box badge-secondary">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $b = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 5) {
		                        	$b++;
		                        }
		                       }
		                       echo $b; 
		                        ?>
		              	
		              </h3>

		                <p>BBA Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>
		          <div class="col-lg-2 col-6">
		            <!-- small box -->
		            <div class="small-box bg-dark">
		              <div class="inner">
		                <h3><?php

		                      $query = "SELECT * FROM books";
		                      $all_user = mysqli_query($db, $query);
		                      $i = 0;
		                      $eng = 0;
		                      while( $row = mysqli_fetch_assoc( $all_user ) ){
		                        $id         = $row['id'];
		                        $b_name   	= $row['b_name'];
		                        $b_id      	= $row['b_id'];
		                        $b_cat   		= $row['b_cat'];
		                        $w_name   	= $row['w_name'];		                        
		                        $i++;
		                        if ($b_cat == 6) {
		                        	$eng++;
		                        }
		                       }
		                       echo $eng;; 
		                        ?>
                        	
                        </h3>

		                <p>ENG Dept. Book</p>
		              </div>
		              <a href="#" class="small-box-footer"></a>
		            </div>
		          </div>
    		</div>
    	</div>
    </div>   

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
                <h3 class="card-title">ALL BOOKS</h3>

              </div>
              <div class="card-body" style="display: block;">
                
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

                      $query = "SELECT * FROM books";
                      $all_user = mysqli_query($db, $query);
                      $i = 0;
                      while( $row = mysqli_fetch_assoc( $all_user ) ){
                        $id         = $row['id'];
                        $b_name   	= $row['b_name'];
                        $b_id      	= $row['b_id'];
                        $b_cat   		= $row['b_cat'];
                        $w_name   	= $row['w_name'];                        
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
                <!-- All User Table End -->
               


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

