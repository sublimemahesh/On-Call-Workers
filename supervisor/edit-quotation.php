<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$QUOTATION = new Quotation($id);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Quotation || On Call Workers</title>
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
    <!-- LOADER -->
    <!--        <div id="preloader">
                        <div class="loading_wrap">
                            <img src="../image/logo.jpg" alt="logo">
                        </div>
                    </div>-->
    <!-- LOADER -->
    <?php include './header.php'; ?>
    <div class="container">
        <div class="header-bar font-color">
            <i class="fa fa-plus-circle"></i> Edit Quotation
            <div class="header-bar-icon">
                <a href="manage-quotations.php?id=<?= $JOB->id; ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <form class="form-horizontal" id="edit-quotation-form" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="title">Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control title-input" autocomplete="off" name="title" required="true" value="<?= $QUOTATION->title; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row button-add-property">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 p-l-0">
                                <input type="hidden" name="id" value="<?= $id; ?>" />
                                <input type="submit" name="btn-save" id="btn-update" class="btn btn-info member-btn-mrg" value="Update Quotation" />
                                <input type="hidden" name="edit-quotation" />
                                <img src="img/loading.gif" id="update-loading" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div id="chart_div"></div>
    </div>

    <?php include './footer.php'; ?>
    <!-- Jquery js -->
    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>
    <script src="../control-panel/plugins/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <!-- Custom css -->
    <!-- <script src="js/custom.js" type="text/javascript"></script> -->
    <script src="js/quotation.js" type="text/javascript"></script>
    <script src="js/upload-photos.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
    <script src="js/exchange-currency.js" type="text/javascript"></script>
    <script src="lib/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/mask.init.js" type="text/javascript"></script>

</body>

</html>