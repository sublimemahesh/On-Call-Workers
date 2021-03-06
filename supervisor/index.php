<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';

$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
?>
<!doctype html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>On Call Workers</title>
    <!-- Required meta tags -->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <!-- Font Css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/font-awesome-4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap Css -->
    <!--        <link href="css/bootstrap.css" type="text/css" rel="stylesheet">-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="css/font-awesome.css" rel="stylesheet" type="text/css" />

    <!-- main css -->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <link href="../control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">

</head>

<body class="theme-2">
    <!-- LOADER -->
    <!--        <div id="preloader">
            <div class="loading_wrap">
                <img src="../image/logo.jpg" alt="logo">
            </div>
        </div>-->
    <!-- LOADER -->

    <?php include './header.php'; ?>
    <div class="container">
        <div class="header-bar font-color header-text dashboard dash-top">
            <i class="fa fa-dashboard"></i> Dashboard
        </div>

        <div class="row">
            <div class="col-md-3 col-sm-6">
                <a class="sub-box text-center text-c dash-box " href="manage-jobs.php?status=1">
                    <b class="font-supervisor-box">Pending Jobs</b>
                    <hr />
                    <i class="fa fa-plus-circle"></i>
                    <hr />

                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a class="sub-box text-center text-c dash-box " href="manage-jobs.php?status=2">
                    <b class="font-supervisor-box">Processing Jobs</b>
                    <hr />
                    <i class="fa fa-spinner"></i>
                    <hr />

                </a>
            </div>
            <div class="col-md-3 col-sm-6 box-bottom ">
                <a class="sub-box text-center text-c " href="manage-jobs.php?status=3">
                    <b class="font-supervisor-box">Approved Jobs</b>
                    <hr />
                    <i class="fa fa-check-circle-o text-danger"></i>
                    <hr />
                </a>
            </div>
            <div class="col-md-3 col-sm-6">
                <a class="sub-box text-center text-c" href="manage-jobs.php?status=4">
                    <b class="font-supervisor-box">Completed Jobs</b>
                    <hr />
                    <i class="fa fa-question-circle text-danger"></i>
                    <hr />
                </a>
            </div>
        </div>
    </div>
    <?php include './footer.php'; ?>
    <!-- Jquery js -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>

</body>

</html>