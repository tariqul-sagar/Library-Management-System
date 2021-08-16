 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/logo.jpg" alt="Library Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
      <span class="brand-text font-weight-light">Our Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/users/<?php echo $_SESSION['avater'];?>" class="img-circle elevation-2" alt="User Image">          
        </div>
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['fullname'];?></a>
        </div>
      </div>      

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="dashboard.php" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          <li class="nav-header">Book Category</li>
          <!--  Manage All Category -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-chart-pie"></i>
              <p>
                Manage Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="category.php" class="nav-link">
                  <i class="far fas fa-plus-circle"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="categorylist.php" class="nav-link">
                  <i class="far fas fa-eye"></i>
                  <p>View Category</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">User Info</li>
          <!--  Manage All User -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-solid fa-users"></i>
              <p>
                Manage User
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="createuser.php" class="nav-link">
                  <i class="far fas fa-solid fa-user-plus"></i>
                  <p>Register New User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="allUser.php" class="nav-link">
                  <i class="far fas fa-solid fa-user-check"></i>
                  <p>View All User</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-header">Book List</li>
          <!--  Manage All User -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th-large"></i>
              <p>
               All Book
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="add-book.php" class="nav-link">
                  <i class="far fas fa-solid fa-plus"></i>
                  <p>Add Book</p>
                </a>
              </li> 
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="booklist.php" class="nav-link">
                  <i class="far fas fa-solid fa-eye"></i>
                  <p>View List</p>
                </a>
              </li> 
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="search.php" class="nav-link">
                  <i class="fa fa-comment"></i>
                  <p>Request Book</p>
                </a>
              </li> 
            </ul>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="search.php" class="nav-link">
                  <i class="far fas fa-solid fa-search"></i>
                  <p>Search</p>
                </a>
              </li> 
            </ul>         
                                    
          </li>


          <li class="nav-header">Distribution</li>
          <!--  Issue Book -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
               Book Borrow
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <?php

              $query = "SELECT * FROM users";

              if ($_SESSION['role'] == 0) { ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="request.php" class="nav-link">
                      <i class="far fas fa-solid fa-plus"></i>
                      <p>Requested Book</p>
                    </a>
                  </li> 
                </ul>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="issuebook.php" class="nav-link">
                      <i class="far fas fa-solid fa-check"></i>
                      <p>Issue Book</p>
                    </a>
                  </li> 
                </ul>
            <?php  }
              else{ ?>
                <ul class="nav nav-treeview">
                  <li class="nav-item">
                    <a href="request.php" class="nav-link">
                      <i class="far fas fa-solid fa-check"></i>
                      <p>Requested Book</p>
                    </a>
                  </li> 
                </ul>
            <?php  }

              ?>                    
                                      
            </li>
          

          <!-- <li class="nav-header">LABELS</li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Important</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-warning"></i>
              <p>Warning</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-circle text-info"></i>
              <p>Informational</p>
            </a>
          </li> -->

        </ul>
      </nav>
      <div class="footer"></div>
      <!-- /.sidebar-menu -->
    </div>

    <!-- /.sidebar -->
  </aside>



  