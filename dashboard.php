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
            <h1 class="m-0">Dashboard</h1>
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
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php
                  $query = "SELECT * FROM users";
                  $all_user = mysqli_query($db, $query);
                  $i = 0;
                  $count=0;
                  while( $row = mysqli_fetch_assoc( $all_user ) ){
                    $id         = $row['id'];
                    $fullname   = $row['fullname'];
                    $email      = $row['email'];
                    $username   = $row['username'];
                    $password   = $row['password'];
                    $role       = $row['role'];
                    $gender     = $row['gender'];
                    $address    = $row['address'];
                    $phone      = $row['phone'];
                    $avater     = $row['avater'];
                    $joindate   = $row['joindate'];
                    $i++;
                    if ( $role == 1) {
                    $count++;
                    }
                  }                   
                                   
                  echo $count;

              ?></h3>

                <p>Total Students</p>
              </div>
              <div class="icon">
                <i class="ion ionicons ion-university"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php
                  $query = "SELECT * FROM users";
                  $all_user = mysqli_query($db, $query);
                  $i = 0;
                  $count=0;
                  while( $row = mysqli_fetch_assoc( $all_user ) ){
                    $id         = $row['id'];
                    $fullname   = $row['fullname'];
                    $email      = $row['email'];
                    $username   = $row['username'];
                    $password   = $row['password'];
                    $role       = $row['role'];
                    $gender     = $row['gender'];
                    $address    = $row['address'];
                    $phone      = $row['phone'];
                    $avater     = $row['avater'];
                    $joindate   = $row['joindate'];
                    $i++;
                    if ( $role == 2) {
                    $count++;
                    }
                  }                   
                                   
                  echo $count;

              ?></h3>

                <p>Total Teacher</p>
              </div>
              <div class="icon">
                <i class="ion ionicons ion-android-contacts"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php
                  $query = "SELECT * FROM users";
                  $all_user = mysqli_query($db, $query);
                  $i = 0;
                  while( $row = mysqli_fetch_assoc( $all_user ) ){
                    $id         = $row['id'];
                    $fullname   = $row['fullname'];
                    $email      = $row['email'];
                    $username   = $row['username'];
                    $password   = $row['password'];
                    $role       = $row['role'];
                    $gender     = $row['gender'];
                    $address    = $row['address'];
                    $phone      = $row['phone'];
                    $avater     = $row['avater'];
                    $joindate   = $row['joindate'];
                    $i++;
                  }                  
                  
                  echo $i;

              ?></h3>

                <p>Total Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer"></a>
            </div>
          </div>          
          <!-- ./col -->

          <!-- Slider -->

            <div class="slider">
              <div class="slider-box">
                <img src="dist/img/slider/img1.jpg" class="slider-img">
              </div>
            </div>


            <!-- Next, Prev Button -->

            <div class="btn-box">
              <button class="btn-next" onclick="prev()">PREV</button>
              <button class="btn-next" onclick="next()">NEXT</button>
            </div>



            <script type="text/javascript">
              
              var slider_img = document.querySelector('.slider-img');
              var images = ['img2.jpg','img7.jpg','img6.jpg','img4.jpg','img3.jpg','img8.jpg'];
              var i = 0;

              function prev(){
                if (i <= 0) i = images.length;
                i--;
                return setImg();
              }

              function next(){
                if (i >= images.length - 1) i = -1;
                i++;
                return setImg();
              }

              function setImg(){
                return slider_img.setAttribute('src', 'dist/img/slider/'+images[i]);
              }

            </script>

          

        </div>
        <!-- /.row -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>




<?php

  include "inc/footer.php";

?>
