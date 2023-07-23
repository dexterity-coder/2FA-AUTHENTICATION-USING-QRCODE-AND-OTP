<?php
session_start();
include 'includes/connection.php';
include 'includes/functions.php';
$error = "";

$mobile = isset($_SESSION["phone"]) ? $_SESSION["phone"] : "";
$message = isset($_SESSION["msg"]) ? $_SESSION["msg"] : "";

if ($mobile == "") {
    header("location:index.php");
}

if (isset($_POST["submit"])) {
    $otp = $_POST["otp"];

    $get_otp = mysqli_query($conn, "select * from otp where userid='$mobile' and status='1'");
    $get_otp_array = mysqli_fetch_array($get_otp);
    $otp_code = $get_otp_array["code"];
    $num_row = mysqli_num_rows($get_otp);

    if ($otp == $otp_code) {
        $get_rc = mysqli_query($conn, "select * from login where username='$mobile'");
        $row = mysqli_fetch_array($get_rc);
        $_SESSION["userid"] = $row["username"];
        $_SESSION["urole"] = $row["role"];
        $update_rec = mysqli_query($conn, "update otp set status='0' where code='$otp_code'");
        if ($row["role"] == "admin") {
            $_SESSION["userid"] = $row["username"];
            $_SESSION["urole"] = $row["role"];
            header("location:../admin/index.php");
        } else {
            $_SESSION["userid"] = $row["username"];
            $_SESSION["urole"] = $row["role"];
            header("location:../admin/home.php");
        }
    } else {
        echo "<script>alert('Incorrect OTP, please check and try again.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="zxx">

    <head>
        <title><?php echo $sitename ?></title>
        <!-- Meta tag Keywords -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta charset="UTF-8" />
        <meta name="keywords"
              content="Trendz Login Form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
        <script>
            addEventListener("load", function () {
                setTimeout(hideURLbar, 0);
            }, false);

            function hideURLbar() {
                window.scrollTo(0, 1);
            }
        </script>
        <script src="ht.js"></script>
        <style>
            .result{
                background-color: green;
                color:#fff;
                padding:20px;
            }
            .row{
                display:flex;
            }
        </style>
        <!-- //Meta tag Keywords -->
        <!--/Style-CSS -->
        <link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
        <!--//Style-CSS -->
    </head>

    <body>
        <!-- /login-section -->

        <section class="w3l-forms-23">
            <div class="forms23-block-hny">
                <div class="wrapper">

                    <div class="d-grid forms23-grids">
                        <div class="form23">

                            <div class="bottom-content">
                                <h3><?php echo $sitename ?></h3>
                                <form action="" method="post"> 
                                    <div class="col" style="padding:30px;">
                                        <h4>ENTER OTP</h4>
                                        <input type="text" name="otp" class="input-form" placeholder="Enter OTP" required="required" />
                                    </div>
                            </div>


                            <button type="submit" name="submit" class="loginhny-btn btn">Login</button>
                            </form>
                          <!--  <p>Not yet registered? <a href="register.php">Signup</a></p> -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- //login-section -->
</body>
</html>