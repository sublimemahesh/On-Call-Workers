<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include './auth.php';
$SUPERVISOR = new Supervisor($_SESSION["m_id"]);
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$JOB = new Job($id);
$DISTRICT = new District($JOB->district);
$CITY = new City($JOB->city);
$CATEGORY = new Category($JOB->category);
$SUBCAT = new SubCategory($JOB->sub_category);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Job || On Call Workers</title>
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
            <i class="fa fa-eye"></i> View Job Details - #<?= $JOB->id; ?>
            <div class="header-bar-icon">
                <a href="manage-jobs.php?status=<?= $JOB->status; ?>">
                    <i class="fa fa-list"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="panel-box">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-striped table-hover">
                                <tr>
                                    <th>Job ID</th>
                                    <td><?= '#' . $JOB->id; ?></td>
                                </tr>
                                <tr>
                                    <th>Created At</th>
                                    <td><?= $JOB->createdAt; ?></td>
                                </tr>
                                <tr>
                                    <th>Category</th>
                                    <td><?= $CATEGORY->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Sub Category</th>
                                    <td><?= $SUBCAT->name; ?></td>
                                </tr>
                                <tr>
                                    <th>District</th>
                                    <td><?= $DISTRICT->name; ?></td>
                                </tr>
                                <tr>
                                    <th>City</th>
                                    <td><?= $CITY->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Name</th>
                                    <td><?= $JOB->name; ?></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><?= $JOB->email; ?></td>
                                </tr>
                                <tr>
                                    <th>Phone Number</th>
                                    <td><?= $JOB->phone; ?></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        <?php
                                        if ($JOB->status == 1) {
                                            echo 'Pending';
                                        } else if ($JOB->status == 2) {
                                            echo 'Processing';
                                        } else if ($JOB->status == 3) {
                                            echo 'Confirmed';
                                        } else if ($JOB->status == 4) {
                                            echo 'Completed';
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Description</th>
                                    <td><?= $JOB->description; ?></td>
                                </tr>
                            </table>
                            <?php
                            if ($JOB->status > 2) {
                                $QUOTATION = new Quotation(NULL);
                                $quotations = $QUOTATION->getQuotationsbyByJob($id);
                            ?>
                                <h4>Quotations</h4>
                                <br />
                                <?php
                                foreach ($quotations as $quotation) {
                                    $QUOTATION_ITEM = new QuotationItem(NULL);
                                    $items = $QUOTATION_ITEM->getItemsByQuotation($quotation['id']);
                                ?>
                                    <p><b>Title: <?= $quotation['title']; ?></b></p>
                                    <p><b>Created At: <?= $quotation['created_at']; ?></b></p>
<br />
                                    <table class="table table-striped table-hover">
                                        <tr>
                                            <td>Id</td>
                                            <td colspan="2">Item</td>
                                            <td>Amount (LKR)</td>
                                        </tr>

                                        <?php
                                        foreach ($items as $key => $item) {
                                        ?>
                                            <tr>
                                                <td><?= $key + 1; ?></td>
                                                <td colspan="2"><?= $item['description']; ?></td>
                                                <td><?= $item['amount']; ?></td>
                                            </tr>

                                        <?php
                                        }
                                        ?>
                                    </table>
                                <?php
                                }
                                ?>

                            <?php
                            }
                            ?>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-back">
                                <a href="manage-jobs.php?status=<?= $JOB->status; ?>" class="btn btn-success">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
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
    <script src="js/dealer_area.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>


</body>

</html>