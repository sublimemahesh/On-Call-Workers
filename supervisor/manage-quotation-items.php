<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$QUOTATION = new Quotation($id);
$JOB = new Job($QUOTATION->job);
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

    <title>Quotation Items || On Call Workers</title>
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
            <i class="fa fa-plus-circle"></i> Add Quotation Items
            <div class="header-bar-icon">
                <a href="manage-quotations.php?id=<?= $QUOTATION->job; ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box form-box-inner">
                    <form class="form-horizontal" id="quotation-item-form" method="post" action="" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="title">Description <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <textarea id="description" class="form-control title-input" name="description" required="true"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                                <label for="title">Amount (LKR) <span class="text-danger">*</span></label>
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 p-bottom text-input-i">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" id="amount" class="form-control title-input" autocomplete="off" name="amount" required="true" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row button-add-property">
                            <div class="col-lg-3 col-md-3 form-control-label text-right title-mobile text-i">
                            </div>
                            <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12 p-l-0">
                                <input type="hidden" name="quotation" value="<?= $id; ?>" />
                                <input type="submit" name="btn-save" id="btn-save" class="btn btn-info member-btn-mrg" value="Add Quotation Item" />
                                <input type="hidden" name="add-quotation-item" />
                                <img src="img/loading.gif" id="update-loading" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="header-bar font-color">
            <i class="fa fa-link"></i> Manage Quotation Items

        </div>
        <div class="row">
            <div class="col-md-12 table-mrg">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data_table dataTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount (LKR)</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $items = QuotationItem::getItemsByQuotation($id);
                            if (count($items) > 0) {
                                foreach ($items as $key => $item) {
                                    $key++;

                            ?>
                                    <tr id="row_<?php echo $item['id']; ?>">
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $item['description']; ?></td>
                                        <td>Rs. <?php echo $item['amount']; ?>/= </td>

                                        <td class="text-center">
                                            <a href="edit-quotation-item.php?id=<?= $item['id']; ?>" class="edit-property btn btn-sm btn-info" title="Edit Quotation Item" data-id=""> <i class="fa fa-pencil"></i></a> |
                                            <a class="delete-quotation-item btn btn-sm btn-danger" title="Delete Quotation Item" data-id="<?= $item['id']; ?>"> <i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No any quotation items.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Description</th>
                                <th>Amount</th>
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
    <script src="js/quotation-item.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
    <script src="js/exchange-currency.js" type="text/javascript"></script>
    <script src="lib/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="js/mask.init.js" type="text/javascript"></script>

</body>

</html>