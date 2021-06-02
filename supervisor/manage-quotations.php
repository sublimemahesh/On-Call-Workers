<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$JOB = new Job($id);
if($JOB->status > 2) {
    redirect('access-denied.php');
}
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
            <i class="fa fa-plus-circle"></i> Add Quotation
            <div class="header-bar-icon">
                <a href="manage-jobs.php?status=<?= $JOB->status; ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <form class="form-horizontal" id="quotation-form" method="post" action="" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="title">Title <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="title" class="form-control title-input" autocomplete="off" name="title" required="true">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row button-add-property">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 p-l-0">
                                <input type="hidden" name="supervisor" value="<?= $_SESSION['m_id']; ?>" />
                                <input type="hidden" name="job" value="<?= $id; ?>" />
                                <input type="submit" name="btn-save" id="btn-save" class="btn btn-info member-btn-mrg" value="Add Quotation" />
                                <input type="hidden" name="add-quotation" />
                                <img src="img/loading.gif" id="update-loading" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-bar font-color">
            <i class="fa fa-link"></i> Manage Quotations

        </div>
        <div class="row">
            <div class="col-md-12 table-mrg">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data_table dataTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $quotations = Quotation::getQuotationsbyBySupervisorAndJob($_SESSION['m_id'], $id);
                            if (count($quotations) > 0) {
                                foreach ($quotations as $key => $quotation) {
                                    $key++;

                            ?>
                                    <tr id="row_<?php echo $quotation['id']; ?>">
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $quotation['created_at']; ?></td>
                                        <td><?php echo $quotation['title']; ?> </td>
                                        <td><?php
                                            if ($quotation['status'] == 0) {
                                                echo 'Pending';
                                            } else {
                                                echo 'Approved';
                                            }
                                            ?> </td>
                                        <td class="text-center">
                                            <a href="edit-quotation.php?id=<?= $quotation['id']; ?>" class="edit-property btn btn-sm btn-info" title="Edit Quotation" data-id=""> <i class="fa fa-pencil"></i></a> 
                                            | <a href="manage-quotation-items.php?id=<?= $quotation['id']; ?>" class="edit-property btn btn-sm btn-success" title="Manage Quotation Items" data-id=""> <i class="fa fa-list"></i></a> 
                                            <?php
                                            if ($key != 1) {
                                            ?>
                                                | <a class="delete-quotation btn btn-sm btn-danger" title="Delete Quotation" data-id="<?= $quotation['id']; ?>"> <i class="fa fa-trash"></i></a>
                                            <?php
                                            }
                                            ?>

                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No any quotations.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Created At</th>
                                <th>Title</th>
                                <th>Status</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </tfoot>
                    </table>
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