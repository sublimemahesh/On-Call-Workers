<?php
include_once(dirname(__FILE__) . '/../class/include.php');
include_once(dirname(__FILE__) . '/auth.php');

$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$CATEGORY = new Category($id);
?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sub Category</title>
    <!-- Favicon-->
    <link rel="icon" href="../images/realstate/sl-property-fav.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />
    <link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <link href="css/style.css" rel="stylesheet">
    <link href="css/themes/all-themes.css" rel="stylesheet" />
</head>

<body class="theme-red">
    <?php
    include './navigation-and-header.php';
    ?>

    <section class="content">
        <div class="container-fluid">
            <?php
            $vali = new Validator();

            $vali->show_message();
            ?>
            <!-- Vertical Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>Create Sub Category - <?= $CATEGORY->name; ?></h2>
                            <ul class="header-dropdown">
                                <li>
                                    <a href="manage-categories.php">
                                        <i class="material-icons">list</i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
                            <form class="form-horizontal" method="post" action="post-and-get/sub-category.php" enctype="multipart/form-data">
                                <div class="col-md-12">
                                    <div class="form-group form-float">
                                        <div class="form-line">
                                            <input type="text" id="name" class="form-control" autocomplete="off" name="name" required="true">
                                            <label class="form-label">Name</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="hidden" name="category" value="<?= $CATEGORY->id; ?>" />
                                    <input type="submit" name="create" class="btn btn-primary m-t-15 waves-effect" value="create" />

                                </div>
                            </form>
                            <div class="row">
                            </div>
                            <div class="row clearfix">
                                <hr />
                                <div class="heading m-cat">
                                    <p>Manage Sub Categories</p>
                                    <a href="manage-sub-categories.php">
                                    </a>
                                </div>

                                <div class="p-l-r-20">
                                    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Options</th>
                                                <!--                                                    <th>Category ID</th>-->
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Options</th>
                                                <!--                                                    <th>Category ID</th>-->
                                            </tr>
                                        </tfoot>
                                        <tbody>

                                            <?php
                                            foreach (SubCategory::getSubCategoriesByCategory($id) as $key => $sub_category) {
                                                $key++;
                                            ?>
                                                <tr id="row_<?php echo $sub_category['id']; ?>">
                                                    <td><?php echo $key; ?></td>
                                                    <td><?php echo $sub_category['name']; ?></td>
                                                    <!--                                                        <td><?php echo $sub_category['category']; ?></td> -->
                                                    <td>

                                                        <a href="edit-sub-category.php?id=<?php echo $sub_category['id']; ?>"> <button class="glyphicon glyphicon-pencil edit-btn" title="Edit Sub Category"></button>
                                                        </a>

                                                        |

                                                        <a href="#">
                                                            <button class="glyphicon glyphicon-trash delete-btn delete-sub-category" title="Delete Sub Category" data-id="<?php echo $sub_category['id']; ?>"></button>
                                                        </a>

                                                        |

                                                        <a href="arrange-sub-category.php?id=<?php echo $sub_category['category']; ?>">
                                                            <button class="glyphicon glyphicon-random arrange-btn" title="Arrange Sub Category"></button>
                                                        </a>



                                                    </td>
                                                </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Manage brand -->
        </div>



        <!-- #END# Vertical Layout -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/bootstrap/js/bootstrap.js"></script>
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script src="plugins/node-waves/waves.js"></script>
    <script src="js/admin.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/add-new-ad.js" type="text/javascript"></script>
    <script src="delete/js/sub-category.js" type="text/javascript"></script>

    <script src="plugins/sweetalert/sweetalert.min.js"></script>
    <script src="plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <script src="js/pages/ui/dialogs.js"></script>
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
</body>

</html>