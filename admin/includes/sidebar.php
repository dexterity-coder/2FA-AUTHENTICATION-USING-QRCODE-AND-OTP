<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p><?php echo $role; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <?php
            if ($role == "admin") {
                ?>
                <li class="active treeview">
                    <a href="index.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>


                <li class="active treeview">
                    <a href="revenueofficer.php">
                        <i class="fa fa-share"></i> <span>Add Revenue Officer</span>
                    </a>
                </li>

                <!--    <li class="active treeview">
                       <a href="routes.php">
                           <i class="fa fa-share"></i> <span>Distribution Routes</span>
                       </a>
                   </li>
                -->
                <li class="active treeview">
                    <a href="orders.php">
                        <i class="fa fa-share"></i> <span>Revenue Records</span>
                    </a>
                </li>

                <?php
            } else {
                ?>

                <li class="active treeview">
                    <a href="home.php">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                <li class="active treeview">
                    <a href="rev_col.php">
                        <i class="fa fa-dashboard"></i> <span>Revenue Collection</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>
                </li>
                <?php
            }
            ?>


            <li class="active treeview">
                <a href="changepass.php">
                    <i class="fa fa-share"></i> <span>Change Password</span>
                </a>
            </li>

            <li class="active treeview">
                <a href="logout.php">
                    <i class="fa fa-share"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
