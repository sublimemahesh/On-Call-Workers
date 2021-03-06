<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');


$title = "Manage";
if (isset($_GET['type'])) {
    if ($_GET['type'] == 0) {
        $jobs = Job::getJobsByStatus(0);
        $title = "Pending";
    } elseif ($_GET['type'] == 1) {
        $jobs = Job::getJobsByStatus(1);
        $title = "Assigned";
    } elseif ($_GET['type'] == 2) {
        $jobs = Job::getJobsByStatus(2);
        $title = "Processing";
    } elseif ($_GET['type'] == 3) {
        $jobs = Job::getJobsByStatus(3);
        $title = "Confirmed";
    } elseif ($_GET['type'] == 4) {
        $jobs = Job::getJobsByStatus(4);
        $title = "Completed";
    }
}


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
                    <div class="card">
                        <div class="header">
                            <h2>
                                <?= $title; ?> Jobs
                            </h2>
                            <!--                            <ul class="header-dropdown">
                                <li>
                                    <a href="create-property.php">
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>-->
                        </div>
                        <div class="body">
                            <!-- <div class="table-responsive">-->
                            <div>
                                <div class="row clearfix">
                                    <?php if (count($jobs) > 0) : ?>
                                        <div class="table-responsive m-l-20 m-r-20">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Name</th>
                                                        <th>Supervisor</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Name</th>
                                                        <th>Supervisor</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($jobs as $key => $job) :
                                                        $MEM = new Supervisor($job['supervisor']);
                                                        $DISTRICT = new District($job['district']);
                                                        $name = '-';
                                                        if ($job['status'] != 0) {
                                                            $SUPERVISOR = new Supervisor($job['supervisor']);
                                                            $name = $SUPERVISOR->name;
                                                        }
                                                    ?>
                                                        <tr id="row_<?= $job['id']; ?>">
                                                            <td><?= $key + 1; ?></td>
                                                            <td><?= $job['category_name']; ?></td>
                                                            <td><?= $DISTRICT->name; ?></td>
                                                            <td><?= $job['name']; ?></td>
                                                            <td><?= $name; ?></td>
                                                            <td>
                                                                <a href="view-job.php?id=<?php echo $job['id']; ?>"> <button class="glyphicon glyphicon-eye-open edit-btn" title="View Job"></button></a>
                                                                <?php

                                                                if ($_GET['type'] == 0) {
                                                                ?>
                                                                    <a href="#" class="assign-supervisor" data-id="<?php echo $job['id']; ?>"> <button type="button" class="glyphicon glyphicon-user arrange-btn" title="Assign Supervisor"> </button> </a>
                                                                    <a href="#" class="delete-job" data-id="<?= $job['id']; ?>"> <button class="glyphicon glyphicon-trash delete-btn" title="Delete this Job"></button></a>
                                                                <?php
                                                                }
                                                                if ($_GET['type'] == 2) {
                                                                ?>
                                                                    <a href="#" class="approve-job" data-id="<?= $job['id']; ?>"> <button class="glyphicon glyphicon-check arrange-btn" title="Approve this Job"></button></a>
                                                                <?php
                                                                }
                                                                if ($_GET['type'] == 3) {
                                                                ?>
                                                                    <a href="#" class="complete-job" data-id="<?= $job['id']; ?>"> <button class="glyphicon glyphicon-check delete-btn" title="Complete this Job"></button></a>
                                                                <?php
                                                                }
                                                                ?>



                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <b style="padding-left: 15px;">No any jobs.</b>
                                    <?php endif ?>

                                </div>
                            </div>
                            <!--</div>-->
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
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/pages/tables/jquery-datatable.js"></script>

    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <!-- <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script> -->
    <script src="js/pages/ui/dialogs.js"></script>
    <!-- <script src="js/demo.js"></script> -->
    <script src="js/job.js" type="text/javascript"></script>
    <script src="delete/js/job.js" type="text/javascript"></script>
</body>

</html>