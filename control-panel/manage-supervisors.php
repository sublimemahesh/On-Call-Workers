<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$supervisors = Supervisor::all();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Supervisor</title>
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
                                Manage Supervisors
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="create-supervisor.php">
                                        <i class="material-icons">add</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <!-- <div class="table-responsive">-->
                            <div>
                                <div class="row clearfix">
                                    <?php if (count($supervisors) > 0) : ?>
                                        <div class="table-responsive m-l-20 m-r-20">
                                            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Phone No.</th>
                                                        <th>District</th>
                                                        <th>Joined At</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Phone No.</th>
                                                        <th>District</th>
                                                        <th>Joined At</th>
                                                        <th>Status</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                                                    <?php foreach ($supervisors as $supervisor) :
                                                        $DISTRICT = new District($supervisor['district']);
                                                    ?>
                                                        <tr>
                                                            <!-- <td><img src="../upload/property/<?php echo $property['image_name']; ?>" class="img-responsive img-thumbnail" width="100"></td> -->
                                                            <td><?= $supervisor['id']; ?></td>
                                                            <td><?= $supervisor['name']; ?></td>
                                                            <td><?= $supervisor['phone']; ?></td>
                                                            <td><?= $DISTRICT->name; ?></td>
                                                            <td><?= $supervisor['joined_at']; ?></td>
                                                            <td>
                                                                <?php
                                                                if ($supervisor['is_active'] == 0) {
                                                                    echo 'Inactive';
                                                                } else {
                                                                    echo 'Active';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a href="view-supervisor.php?id=<?php echo $supervisor['id']; ?>"> <button class="	glyphicon glyphicon-eye-open edit-btn"></button></a>
                                                                <a href="#" class="toggle-activation" toggler="<?= $supervisor['is_active']; ?>" data-id="<?php echo $supervisor['id']; ?>"> <button type="button" class="glyphicon glyphicon-check <?= $supervisor['is_active'] == 0 ? "approvation-btn-warning" : "approvation-btn-success" ?>"> </button> </a>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>

                                                </tbody>
                                            </table>
                                        </div>
                                    <?php else : ?>
                                        <b style="padding-left: 15px;">No any supervisors.</b>
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
    <script src="js/supervisor.js" type="text/javascript"></script>
</body>

</html>