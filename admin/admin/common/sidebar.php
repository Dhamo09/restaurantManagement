<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="index3.html" class="brand-link">
        <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: 0.8" />
        <span class="brand-text font-weight-light">Restaurant</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <?php
            include_once("include/config.php");
            $qry = "SELECT name FROM admin";
            $res = mysqli_query($conn, $qry);
            $row = mysqli_fetch_row($res);
            ?>
            <div class="image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image" />
            </div>
            <div class="info">
                <a href="#" class="d-block"><?php echo $row[0]; ?></a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" data-accordion="false" role="menu">
                <li class="nav-item">
                    <a href="dashboard.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/dashboard.php'?"active":'') ?>">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                
            
            
            
                <?php
                include_once('include/config.php');
                $qry = "SELECT ID FROM category";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                    <a href="category.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/category.php'?"active":'') ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Category
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li>
                <?php
                include_once('include/config.php');
                $qry = "SELECT ID FROM subcategory";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                    <a href="subcategory.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/subcategory.php'?"active":'') ?>">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                           Sub Category
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li>

                <!-- <?php
                include_once('include/config.php');
                $qry = "SELECT ID FROM category";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                    <a href="category.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/category.php'?"active":'') ?>">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Category
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li> -->
                
                <?php
                include_once('include/config.php');
                $qry = "SELECT tid FROM tablebook";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                    <a href="tablebook.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/tablebook.php'?"active":'') ?>">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>
                          Booked Table
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li>



                <?php
                include_once('include/config.php');
                $qry = "SELECT ID FROM user";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                <a href="user.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/user.php'?"active":'') ?>">
                        <i class="nav-icon fa fa-user-alt"></i>
                        <p>
                            Users
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li>
                <?php
                include_once('include/config.php');
                $qry = "SELECT ID FROM admin";
                $res = mysqli_query($conn, $qry);
                $count = mysqli_num_rows($res);
                ?>
                <li class="nav-item">
                <a href="admin.php" class="nav-link <?php echo ($_SERVER['SCRIPT_NAME']=='/Texi services/admin/admin.php'?"active":'') ?>">
                        <i class="nav-icon fa fa-user-alt"></i>
                        <p>
                            Admin
                            <span class="badge badge-info right"><?php echo $count; ?></span>
                        </p>
                    </a>
                </li>
              
            </ul>
        </nav>
    </div>
</aside>