<?php

include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id =  $_GET['id'];
    $SUPERVISOR = new Supervisor($id);
    $DISTRICT = new District($SUPERVISOR->district);
    $CITY = new City($SUPERVISOR->city);
}
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
                                View Supervisor - #<?= $SUPERVISOR->id; ?>
                            </h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="manage-supervisors.php">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <div>
                                <div class="row clearfix">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <table class="table table-striped table-hover">
                                                <tr>
                                                    <th>Joined At</th>
                                                    <td><?= $SUPERVISOR->joinedAt; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Full Name</th>
                                                    <td><?= $SUPERVISOR->name; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Phone Number</th>
                                                    <td><?= $SUPERVISOR->phone; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Email</th>
                                                    <td><?= $SUPERVISOR->email; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>NIC</th>
                                                    <td><?= $SUPERVISOR->nic; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Address</th>
                                                    <td><?= $SUPERVISOR->address; ?></td>
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
                                                    <th>Status</th>
                                                    <td>
                                                        <?php
                                                        if ($SUPERVISOR->isActive == 0) {
                                                            echo 'Inactive';
                                                        } else if ($SUPERVISOR->isActive == 1) {
                                                            echo 'Active';
                                                        }
                                                        ?>
                                                    </td>
                                                </tr>

                                            </table>
                                        </div>
                                        <div class="col-md-4">
                                            <?php
                                            if (!empty($SUPERVISOR->picture)) {
                                            ?>
                                                <img src="../upload/supervisor/profile/<?= $SUPERVISOR->picture; ?>" />
                                            <?php
                                            } else {
                                            ?>
                                                <img src="images/user1.png" />
                                            <?php
                                            }
                                            ?>

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-back">
                                                <a href="manage-supervisors.php" class="btn btn-success">Back</a>
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
    <script src="js/pages/tables/jquery-datatable.js"></script>
    <script src="js/demo.js"></script>
    <script src="plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
</body>

</html>