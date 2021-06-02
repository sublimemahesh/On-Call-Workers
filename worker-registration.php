<!DOCTYPE html>
<?php
include './class/include.php';
$CATEGORY = new Category(NULL);
$DISTRICT = new District(NULL);
?>

<head>
    <title>On Call Workers | Worker Registration</title>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/f-icon.png" type="image/x-icon.">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" id="color-switcher-link">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link href="control-panel/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>

    <!--[if lt IE 9]>
        <script src="js/vendor/html5shiv.min.js"></script>
        <script src="js/vendor/respond.min.js"></script>
    <![endif]-->

</head>

<body>



    <!-- wrappers for visual page editor and boxed version of template -->
    <div id="canvas">
        <div id="box_wrapper">

            <!-- template sections -->



            <?php
            include './header2.php';
            ?>

            <section class="page_breadcrumbs ds ms parallax section_padding_top_50 section_padding_bottom_40">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="">Worker Registration</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">Worker Registration</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ls ms section_padding_top_15 section_padding_bottom_50 columns_padding_25">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-10 col-sm-push-1">

                            <div class="comment-respond" id="respond">
                                <form class="comment-form" id="form-data" method="POST" enctype="multipart/form-data">
                                    <div class="row columns_padding_5">
                                        <div class="col-md-12">
                                            <p class="comment-form-author">
                                                <select class="form-control" name="category" id="category">
                                                    <option value=""> --Please Select the category -- </option>
                                                    <?php
                                                    foreach ($CATEGORY->all() as $category) {
                                                    ?>
                                                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-author">
                                                <select class="form-control" name="sub_category" id="sub_category">
                                                    <option value=""> --Please Select the sub category -- </option>
                                                </select>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-email">
                                                <input type="text" id="name" class="form-control" autocomplete="off" name="name" placeholder="Name">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-email">
                                                <input type="text" id="phone" class="form-control" autocomplete="off" name="phone" placeholder="Phone Number">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-email">
                                                <input type="text" id="email" class="form-control" autocomplete="off" name="email" placeholder="Email">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-website">
                                            <p class="contact-form-topic">
                                                <select class="form-control" name="district" id="district">
                                                    <option value=""> --Please Select the district -- </option>
                                                    <?php
                                                    foreach ($DISTRICT->all() as $district) {
                                                    ?>
                                                        <option value="<?= $district['id']; ?>"><?= $district['name']; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </p>
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-chat">
                                                <select class="form-control" name="city" id="city">
                                                    <option value=""> --Please Select the city -- </option>

                                                </select>
                                            </p>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-9 col-sm-7 col-xs-6">
                                                <p class="comment-form-email">
                                                    <input type="text" id="captcha" class="form-control" autocomplete="off" name="captcha" placeholder="Captcha Code">
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-sm-5 col-xs-6 refresh-res code-i mb-0">
                                                <div class="form-col">
                                                    <div class="mrg code-m">
                                                        <?php include("./contact-form/captchacode-widget.php"); ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="send-button-center">
                                        <p class="form-submit">
                                            <input type="hidden" name="create" value="create" />
                                            <button id="submit" type="submit" value="create" class="theme_button round-icon round-icon-big colormain2">Register Now<i class="rt-icon2-tick-outline"></i></button>
                                        </p>
                                    </div>

                                </form>
                            </div>


                        </div>
                        <!--eof .col-sm-8 (main content)-->

                    </div>
                </div>
            </section>

            <?php
            include './footer.php';
            ?>

        </div><!-- eof #box_wrapper -->
    </div><!-- eof #canvas -->

    <div class="preloader">
        <div class="preloader_image"></div>
    </div>

    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <script src="control-panel/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="js/city.js"></script>
    <script src="js/sub-category.js"></script>
    <script src="js/registration.js"></script>

</body>


</html>