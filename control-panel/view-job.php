<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$JOB = new Job($id);
$DISTRICT = new District($JOB->district);
$CITY = new City($JOB->city);
$CATEGORY = new Category($JOB->category);
$SUBCAT = new SubCategory($JOB->sub_category);
$SUPERVISOR = new Supervisor($JOB->supervisor);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Jobs</title>
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert2.all.min.css" rel="stylesheet" />
    <link href="plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="plugins/owl-carousel/css/owl.carousel.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/owl-carousel/css/owl.theme.default.min.css">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>
    <section class="content">
        <div class="container-fluid">
            <!-- Manage Brand -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card p-l-r-20">
                        <div class="header">
                            <h2>
                                View Job - #<?= $JOB->id; ?>
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="manage-jobs.php?type=<?= $JOB->status; ?>">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <div class="row clearfix">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table table-striped table-hover">

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
                                                    <th>Description</th>
                                                    <td><?= $JOB->description; ?></td>
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
                                                    <th>Phone</th>
                                                    <td><?= $JOB->phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Status</th>
                                                    <td>
                                                        <?php
                                                        if ($JOB->status == 0) {
                                                            echo 'Pending';
                                                        } else if ($JOB->status == 1) {
                                                            echo 'Assigned';
                                                        } else if ($JOB->status == 2) {
                                                            echo 'Processing';
                                                        } else if ($JOB->status == 3) {
                                                            echo 'Approved';
                                                        } else if ($JOB->status == 4) {
                                                            echo 'Completed';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>
                                                <?php
                                                if ($JOB->status != 0) {
                                                ?>
                                                    <tr>
                                                        <th>Supervisor</th>
                                                        <td><?= $SUPERVISOR->name; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Asigned At</th>
                                                        <td><?= $JOB->assignedAt; ?></td>
                                                    </tr>
                                                <?php
                                                }
                                                ?>

                                            </table>

                                            <?php
                                            if ($JOB->status > 1) {
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
                                                    <h5>Title: <?= $quotation['title']; ?></h5>
                                                    <h5>Created At: <?= $quotation['created_at']; ?></h5>

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




                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="btn-back">
                                                        <a href="manage-jobs.php?type=<?= $JOB->status; ?>" class="btn btn-success">Back</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- #END# Manage brand -->

        </div>
    </section>

    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/bootstrap-select/js/bootstrap-select.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="plugins/owl-carousel/js/owl.carousel.js"></script>
    <script src="js/demo.js"></script>
    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
</body>

</html>