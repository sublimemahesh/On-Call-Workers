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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <title>Jobs || Sri Lanka Properties</title>
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
    <link href="../control-panel/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
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
            <?php
            if ($_GET['status'] == 1) {
            ?>
                <i class="fa fa-link"></i> Manage Pending Jobs
            <?php
            } elseif ($_GET['status'] == 2) {
            ?>
                <i class="fa fa-link"></i> Manage Processing Jobs
            <?php
            } elseif ($_GET['status'] == 3) {
            ?>
                <i class="fa fa-link"></i> Manage Confirmed Jobs
            <?php
            } elseif ($_GET['status'] == 4) {
            ?>
                <i class="fa fa-link"></i> Manage Completed Jobs
            <?php
            }
            ?>
            <div class="header-bar-icon">
                <a href="add-new-property.php">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 table-mrg">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover data_table dataTable" style="width: 100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Assigned At</th>
                                <th>Category</th>
                                <th>District</th>
                                <th>Job Owner</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $jobs = Job::getJobsBySupervisorAndStatus($_SESSION['m_id'], $_GET['status']);

                            if (count($jobs) > 0) {
                                foreach ($jobs as $key => $job) {
                                    $key++;
                                    $DISTRICT = new District($job['district']);
                            ?>
                                    <tr id="row_<?php echo $job['id']; ?>">
                                        <td><?php echo $key; ?></td>
                                        <td><?php echo $job['assigned_at']; ?> </td>
                                        <td><?php echo $job['category_name']; ?> </td>
                                        <td><?php echo $DISTRICT->name; ?> </td>
                                        <td><?php echo $job['name']; ?> </td>
                                        <td class="text-center">
                                            <a href="view-job.php?id=<?= $job['id']; ?>" class="edit-property btn btn-sm btn-warning" title="View Job" data-id=""> <i class="fa fa-eye"></i></a> |
                                            <a href="manage-quotations.php?id=<?= $job['id']; ?>" class="edit-property btn btn-sm btn-info" title="Add Quotation" data-id=""> <i class="fa fa-usd"></i></a> |
                                            <!-- <a class="delete-property btn btn-sm btn-danger" title="Delete Property" data-id="<?= $job['id']; ?>"> <i class="fa fa-trash"></i></a> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No any jobs.</td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Assigned At</th>
                                <th>Category</th>
                                <th>District</th>
                                <th>Job Owner</th>
                                <th class="text-center">Options</th>
                            </tr>
                        </tfoot>
                    </table>
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
    <script src="js/quotation.js" type="text/javascript"></script>
    <script src="js/email-verification.js" type="text/javascript"></script>
</body>

</html>