<?php
session_start();
include '../includes/connection.php';
$role = isset($_SESSION['urole']) ? $_SESSION['urole'] : "";
$userid = isset($_SESSION['userid']) ? $_SESSION['userid'] : "";


if (isset($_GET["id"])) {
    $del = $_GET["id"];
    $delete_rec = mysqli_query($conn, "delete from rev_officer where email='$del'") or die(mysqli_error($conn));
    $delete_log = mysqli_query($conn, "delete from login where username='$del'") or die(mysqli_error($conn));

    if ($delete_log & $delete_rec) {
        echo "<script>alert('Deletion Successfull')</script>";
    } else {
        echo "<script>alert('Operation Failed, try again')</script>";
    }
}

if (isset($_POST["add"])) {
    $fullname = $_POST["fullname"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $agency = $_POST["agency"];
    $loc = $_POST["loc"];
    $price = $_POST["price"];
    $qty = $_POST["qty"];
    $date = $_POST["date"];
    $status = "status";
    $rev_id = "TRANS-" . date("ymdis");

    $insert_record = mysqli_query($conn, "insert into transaction values ('$rev_id','$fullname','$phone','$email','$agency','$loc','$qty','$price','$date','$status','$userid')") or die(mysqli_error($conn));
    if ($insert_record) {

        echo "<script>alert('Operation Successfull')</script>";
    } else {
        echo "<script>alert('Registration Failed, please try again')</script>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Admin | Dashboard</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Bootstrap 3.3.2 -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Font Awesome Icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Ionicons -->
        <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
        <!-- Morris chart -->
        <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
        <!-- jvectormap -->
        <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
        <!-- Daterange picker -->
        <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
        <!-- AdminLTE Skins. Choose a skin from the css/skins 
             folder instead of downloading all of them to reduce the load. -->
        <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue">
        <div class="wrapper">

            <?php
            include 'includes/header.php';
            ?>
            <!-- Left side column. contains the logo and sidebar -->
            <?php
            include 'includes/sidebar.php';
            ?>
            <!-- Right side column. Contains the navbar and content of the page -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Revenue Collection
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Info boxes -->
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">REVENUE</span>
                                </div><!-- /.info-box-content -->
                            </div><!-- /.info-box -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->




                    <div class="row">
                        <div class="col-md-4">
                            <div class="box">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Entry Data</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <div class="btn-group">
                                            <button class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown"><i class="fa fa-wrench"></i></button>
                                            <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Action</a></li>
                                                <li><a href="#">Another action</a></li>
                                                <li><a href="#">Something else here</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#">Separated link</a></li>
                                            </ul>
                                        </div>
                                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <form method="POST" action="" role="form">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Client Name</label>
                                            <input required="" name="fullname" type="text" class="form-control" id="exampleInputPassword1" placeholder="Fullname">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Phone</label>
                                            <input required="" name="phone" type="text" class="form-control" id="exampleInputPassword1" placeholder="Phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Email</label>
                                            <input required="" name="email" type="text" class="form-control" id="exampleInputPassword1" placeholder="Email">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Agency or Orgnization Name</label>
                                            <input required="" name="agency" type="text" class="form-control" id="exampleInputPassword1" placeholder="Agency">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Location</label>
                                            <input required="" name="loc" type="text" class="form-control" id="exampleInputPassword1" placeholder="Location">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Quantity</label>
                                            <input required="" name="qty" type="number" class="form-control" id="exampleInputPassword1" placeholder="Quantity in litres">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Price</label>
                                            <input required="" name="price" type="number" class="form-control" id="exampleInputPassword1" placeholder="Price">
                                        </div>

                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Date Stamp</label>
                                            <input required="" name="date" type="datetime-local" class="form-control" id="exampleInputPassword1" placeholder="Date">
                                        </div>


                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <input type="submit" name="add" value="Submit"  class="btn btn-primary" >
                                    </div>
                                </form>
                            </div><!-- /.box -->
                        </div><!-- /.col -->

                        <div class="col-md-8">
                            <div class="box">
                                <div class="box-header with-border">
                                    <table id="dataTable" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>SN</th>
                                                <th>CUSTOMER NAME</th>
                                                <th>ORDER ID</th>
                                                <th>QUANTITY (litres)</th>
                                                <th>PRICE</th>
                                                <th>DELIVERY LOCATION</th>
                                                <th>DATE STAMP</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $result = mysqli_query($conn, "select * from transaction where revoff='$userid'");
                                            $a = 1;
                                            $sum = 0.0;
                                            while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td><?php echo $a; ?></td>
                                                    <td><?php echo $row["fullname"]; ?></td>
                                                    <td><?php echo $row["tid"]; ?></td>
                                                    <td><?php echo $row["qty"]; ?></td>
                                                    <td> <?php echo "&#x20a6;" . $row["price"]; ?></td>
                                                    <td> <?php echo $row["loc"]; ?></td>
                                                    <td> <?php echo $row["date"]; ?></td>
                                                    <td> <a href="trans_details.php?id=<?php echo $row["tid"]; ?>" class="btn btn-primary">Details</a></td>                                                    
                                                </tr>
                                                <?php
                                                $a++;
                                                $sum = $sum + $row["price"];
                                            }
                                            ?>
                                            <tr>
                                                <td colspan="4">TOTAL REVENUE</td>
                                                <td><?php echo "&#x20a6;" . $sum; ?></td>
                                                <td colspan="3"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <span align="right"> <a href="javascript:printtab()"><b>Print</b></a></span>

                                </div>
                            </div>
                        </div>
                    </div><!-- /.row -->


                    <!-- Main row -->


                </section><!-- /.content -->
            </div><!-- /.content-wrapper -->
            <?php
            include 'includes/footer.php';
            ?>
        </div><!-- ./wrapper -->

        <!-- jQuery 2.1.3 -->
        <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
        <!-- Bootstrap 3.3.2 JS -->
        <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- FastClick -->
        <script src='plugins/fastclick/fastclick.min.js'></script>
        <!-- AdminLTE App -->
        <script src="dist/js/app.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
        <!-- ChartJS 1.0.1 -->
        <script src="plugins/chartjs/Chart.min.js" type="text/javascript"></script>

        <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
        <script src="dist/js/pages/dashboard2.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="dist/js/demo.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function () {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });

            function printtab() {
                var tab = document.getElementById('dataTable');
                newwin = window.open("");
                newwin.document.write(tab.outerHTML);
                newwin.print();
                newwin.close();
            }
        </script>


    </body>
</html>