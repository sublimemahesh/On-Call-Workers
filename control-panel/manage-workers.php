<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$workers = Worker::all();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Workers</title>
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
                                Manage Workers
                            </h2>
                            
                        </div>
                        <div class="body">
                            <!-- <div class="table-responsive">-->
                            <div>
                                <div class="row clearfix">
                                    <?php if (count($workers) > 0) : ?>
                                        <div class="table-responsive m-l-20 m-r-20">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Registered At</th>
                                                        <th>Name</th>
                                                        <th>Phone No.</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Registered At</th>
                                                        <th>Name</th>
                                                        <th>Phone No.</th>
                                                        <th>Category</th>
                                                        <th>District</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($workers as $worker) :
                                                        $DISTRICT = new District($worker['district']);
                                                        $CATEGORY = new Category($worker['category']);
                                                    ?>
                                                        <tr>
                                                            <td><?= $worker['id']; ?></td>
                                                            <td><?= $worker['registered_at']; ?></td>
                                                            <td><?= $worker['name']; ?></td>
                                                            <td><?= $worker['phone']; ?></td>
                                                            <td><?= $CATEGORY->name; ?></td>
                                                            <td><?= $DISTRICT->name; ?></td>
                                                            
                                                            <td>
                                                                <a href="view-worker.php?id=<?php echo $worker['id']; ?>"> <button class="	glyphicon glyphicon-eye-open edit-btn"></button></a>
                                                                <!-- <a href="#" class="toggle-activation" toggler="<?= $worker['is_active']; ?>" data-id="<?php echo $worker['id']; ?>"> <button type="button" class="glyphicon glyphicon-check <?= $worker['is_active'] == 0 ? "approvation-btn-warning" : "approvation-btn-success" ?>"> </button> </a> -->
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <b style="padding-left: 15px;">No any worker registrations.</b>
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

    <script src="js/demo.js"></script>

    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
    <script src="js/demo.js"></script>
</body>

</html>