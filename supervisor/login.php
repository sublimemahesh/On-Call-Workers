<?php
include_once(dirname(__FILE__) . '/../class/include.php');
session_start();
if (isset($_SESSION['m_id'])) {
    header('Location: ./');
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>On Call Workers</title>
    <!-- Favicon Icon Css -->
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
    <div class="container text-center">
        <a href="../"><img src="../images/logo.png" class="logo-login" style="width: 150px" /></a>
    </div>
    <!-- Start My Account Section -->
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 mb-4 col-sm-offset-3 mb-md-0">
                    <div class="title-n">
                        <div>Supervisor Sign in</div>
                    </div>
                    <form method="post" class="login_form" id="login-form">
                        <div class="form-group">
                            <label>Email <span class="required text-danger">*</span></label>
                            <input type="email" required="" class="form-control" name="login_email" id="login_email">
                        </div>
                        <div class="form-group">
                            <label>Password <span class="required text-danger">*</span></label>
                            <input class="form-control" required="" type="password" name="login_password" id="login_password">
                        </div>
                        <div class="form-group form-check p-0">
                            <label>Remember me
                                <input class="defult-check" type="checkbox" name="remember" id="remember">
                                <span class="checkmark"></span>
                            </label>
                            <a href="forget-password.php" class="forgot-password float-right">Forgot Password ?</a>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary" name="login" id="login" value="Log in">Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- End My Account Section -->
    <!-- End Quickview Popup Section -->
    <a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>
    <!-- Jquery js -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <!-- remeber be cookies plugin -->
    <script src="js/jquery.cookie.js" type="text/javascript"></script> 
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <script src="js/custom.js" type="text/javascript"></script>
    <script src="js/city.js" type="text/javascript"></script>
    <script src="js/login.js" type="text/javascript"></script>
    <!-- check cookies for remember me -->
    <script src="js/check-cookies.js" type="text/javascript"></script>
    <script src="lib/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/mask.init.js" type="text/javascript"></script>
    
</body>

</html>