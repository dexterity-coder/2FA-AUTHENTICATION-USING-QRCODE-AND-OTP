<?php
session_start();
include 'includes/connection.php';
include 'includes/functions.php';
$error = "";

if (isset($_POST["submit"])) {
    $phone = $_POST["phone"];

    $get_rc = mysqli_query($conn, "select * from login where username='$phone'");
    $num_rows = mysqli_num_rows($get_rc);
    $log_rc = mysqli_fetch_array($get_rc);
    $mobile = $log_rc["username"];

    $generated_otp_code = purchCode($conn);
    $message = "Your One Time Password is " . $generated_otp_code;
    $date = date("y-m-d");

    if ($num_rows > 0) {
        $_SESSION["phone"] = $mobile;
        $_SESSION["msg"] = $message;
        $send_otp = sendSMS($mobile, $message);
        if ($send_otp) {
            $insert_data = mysqli_query($conn, "insert into otp values ('','$generated_otp_code','$mobile','1','$date')");
            if ($insert_data) {
                echo "<script>alert('OTP Sent Successfully'); window.location.href='otpauthentication.php';</script>";
            } else {
                echo "<script>alert('Oops! looks like there is a down time.'); window.location.href='otpauthentication.php';</script>";
            }
        }
    } else {
        echo "<script>alert('invalid QR Code data, please check and try again.');</script>";
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
                                    <div class="row form23 d-grid forms23-grids">
                                        <div class="col">
                                            <div style="width:100%;" id="reader"></div>
                                        </div><audio id="myAudio1">
                                            <source src="success.mp3" type="audio/ogg">
                                        </audio>
                                        <audio id="myAudio2">
                                            <source src="failes.mp3" type="audio/ogg">
                                        </audio>
                                        <script>
            var x = document.getElementById("myAudio1");
            var x2 = document.getElementById("myAudio2");
            function showHint(str) {
                if (str.length == 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (this.readyState == 4 && this.status == 200) {
                            document.getElementById("txtHint").innerHTML = this.responseText;
                        }
                    };
                    xmlhttp.open("GET", "gethint.php?q=" + str, true);
                    xmlhttp.send();
                }
            }

            function playAudio() {
                x.play();
            }


                                        </script>
                                        <div class="col" style="padding:30px;">
                                            <h4>QR-CODE RESULT</h4>
                                            <input type="text" class="input-form" value="" name="phone" required="required" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" />

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
<script type="text/javascript">
    function onScanSuccess(qrCodeMessage) {
        document.getElementById("result").value = qrCodeMessage;
        showHint(qrCodeMessage);
        playAudio();

    }
    function onScanError(errorMessage) {
        //handle scan error
    }
    var html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {fps: 10, qrbox: 250});
    html5QrcodeScanner.render(onScanSuccess, onScanError);

</script>