 <!-- <div class="wrapper row0">
    <div id="topbar" class="hoc clear"> 
        ################################################################################################ --
        <div class="fl_left">
            <ul class="nospace">
                <li><a href="index.php"><i class="fas fa-home fa-lg"></i></a></li>
                <!--    <li><a href="#">About</a></li>
                  <li><a href="#">Contact</a></li>  --
                <?php
                if (!$_SESSION) {
                    ?>
                    <li><a href="login.php">Login</a></li>
                    <!--  <li><a href="register.php">Register</a></li> -->
                    <?php
                } else {
                    ?>
                    <li><a href="logout.php">Logout</a></li>
                    <?php
                }
                ?>

           <!--   </ul>
        </div>
        <div class="fl_right">
            <ul class="nospace">
                <li><i class="fas fa-phone rgtspace-5"></i> +00 (123) 456 7890</li>
                <li><i class="fas fa-envelope rgtspace-5"></i> info@waterboard.com</li>
            </ul>
        </div>
       ################################################################################################ --
    </div>
</div>

<!-- <div class="wrapper row1">
    <header id="header" class="hoc clear"> 
        <!-- ################################################################################################ --
        <div id="logo" class="one_quarter first">
            <h1><a href="index.php">Automated Revenue Computation System</a></h1>
            <p>Natures Purest Water</p>
        </div>
        <div class="one_quarter"><strong><i class="fas fa-phone rgtspace-5"></i> Call Us:</strong> +00 (123) 456 7890</div>
        <div class="one_quarter"><strong><i class="far fa-clock rgtspace-5"></i> Mon. - Sat.:</strong> 08.00am - 18.00pm</div>
        <div class="one_quarter">
            <form action="#" method="post">
                <label>
                    <select>
                        <option value="" selected="selected" disabled="disabled">Language</option>
                        <option value="English">Default</option>
                        <option value="Tiv">Tiv</option>
                        <option value="Idoma">Idoma</option>
                        <option value="Jukun">Jukun</option>
                    </select>
                </label>
            </form>
        </div>
        <!-- ################################################################################################ --
    </header>
</div> -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<?php
if (!$_SESSION) {
    
} else {
    ?>
    <!--  <div class="wrapper row2">
          <nav id="mainav" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <!--  <ul class="clear">
          <li class="active"><a href="index.php">Home</a></li>                
          <li class="active"><a href="place_order.php">Place Orders</a></li>
          <li class="active"><a href="orders_rec.php">Order History</a></li>
          <li class="active"><a  href="changepass.php">Change Password</a></li> 
      </ul>
    </nav>
    </div> -->
    <?php
}
?>