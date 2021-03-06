<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>On Call Workers</title>
    <!-- Favicon Icon Css -->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="../css/animate.css" type="text/css">
    <!-- Font Css -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="css/font-awesome.css">
    <!-- Bootstrap Css -->
    <link href="css/bootstrap.css" type="text/css" rel="stylesheet">
    <!-- main css -->
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <link href="css/responsive.css" type="text/css" rel="stylesheet">
    <link href="css/custom.css" type="text/css" rel="stylesheet">
    <link href="../control-panel/plugins/sweetalert/sweetalert.css" type="text/css" rel="stylesheet">
</head>

<body class="theme-2">
    <!-- LOADER -->
    <!-- <div id="preloader">
            <div class="loading_wrap">
                <img src="../image/logo.jpg" alt="logo">
            </div>
        </div> -->
    <!-- LOADER -->
    <?php include './header.php'; ?>
    <div class="container">
        <div class="alert alert-danger alert-dismissible" id="alert_profile" role="alert" style="display: none;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <strong>Not Completed!</strong> You must enter all required details before continuing.
        </div>
        <div class="header-bar font-color">
            <i class="fa fa-pencil "></i> Edit Profile
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" id="member-form" method="post" action="" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="name">Name <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-box text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->name)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="name" class="form-control <?= $class; ?>" autocomplete="off" name="name" required="true" value="<?= $SUPERVISOR->name; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="phone">Phone No <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->phone)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="phone" class="form-control <?= $class; ?> phone-inputmask" autocomplete="off" name="phone" required="true" value="<?= $SUPERVISOR->phone; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 hidden-sm hidden-xs form-control-label text-right text-l text-i">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->email)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" id="email" class="form-control <?= $class; ?>" autocomplete="off" name="email" required="true" value="<?= $SUPERVISOR->email; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="district">District <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->district)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <select class="form-control <?= $class; ?>" type="text" id="district" autocomplete="off" name="district">
                                                    <option value="" class="active light-c"> -- Please Select Your District -- </option>
                                                    <?php
                                                    $DISTRICT = new District(NULL);
                                                    foreach ($DISTRICT->all() as $key => $district) {
                                                        if ($SUPERVISOR->district == $district['id']) {
                                                    ?>
                                                            <option value="<?= $district['id']; ?>" selected=""><?= $district['name']; ?></option>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <option value="<?= $district['id']; ?>"><?= $district['name']; ?></option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="city">City <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->city)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <select class="form-control <?= $class; ?>" autocomplete="off" type="text" id="city" autocomplete="off" name="city" required="TRUE">
                                                    <option value="" class="active light-c"> -- Please Select Your City -- </option>
                                                    <?php
                                                    $CITY = new City(NULL);
                                                    foreach ($CITY->GetCitiesByDistrict($SUPERVISOR->district) as $city) {
                                                        if ($city['id'] == $SUPERVISOR->city) {
                                                    ?>
                                                            <option value="<?= $city['id'] ?>" selected=""><?= $city['name']; ?> </option>
                                                        <?php } else {
                                                        ?>
                                                            <option value="<?= $city['id'] ?>"><?= $city['name']; ?> </option>
                                                    <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="address">Address <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->address)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" name="address" class="form-control <?= $class; ?>" id="address" value="<?= $SUPERVISOR->address; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="nic">NIC Number <span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->nic)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="text" name="nic" class="form-control <?= $class; ?>" id="nic" value="<?= $SUPERVISOR->nic; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="nic_fr_photo">Profile Picture<span class="text-danger">*</span></label>
                                    </div>
                                    <div class="col-lg-7 col-md-7 col-sm-11 col-xs-10 p-bottom p-l-sm-20">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->picture)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <input type="file" name="image_name" class="form-control <?= $class; ?>" id="image_name">
                                                <input type="hidden" name="image_name_ex" id="image_name_ex" value="<?= $SUPERVISOR->picture; ?>">

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-sm-1 col-xs-2 p-bottom">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <a href="../upload/supervisor/profile/<?= $SUPERVISOR->picture; ?>" target="_blank" class="btn btn-lg btn-info bt-color img-icon">
                                                    <i class="fa fa-image im-padd"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right text-l text-i">
                                        <label for="nic_fr_photo">Description</label>
                                    </div>
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input text-input-i">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <?php
                                                $class = '';
                                                if (empty($SUPERVISOR->description)) {
                                                    $class = 'border-danger';
                                                }
                                                ?>
                                                <textarea id="description" name="description" class="form-control" rows="5"><?= $SUPERVISOR->description; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-3 form-control-label text-right">
                                    </div>
                                    <div class="col-lg-9  col-md-9 col-sm-12 col-xs-12 p-l-0">
                                        <input type="hidden" name="id" id="customer" value="<?= $SUPERVISOR->id; ?>">
                                        <input type="submit" name="update" id="btn-update" class="btn btn-info bt-color member-btn-mrg" value="Update Details" />
                                        <img src="img/loading.gif" id="update-loading" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div id="chart_div"></div>
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
    <script src="js/supervisor.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
    <script src="lib/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/mask.init.js" type="text/javascript"></script>
    
</body>

</html>