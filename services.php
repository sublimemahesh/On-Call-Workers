<!DOCTYPE html>
<?php
include './class/include.php';

$SERVICE = new Service(NULL);
$services = $SERVICE->all();
?>

<head>
    <title>On Call Workers | Services</title>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/f-icon.png" type="image/x-icon.">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" id="color-switcher-link">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/fonts.css">
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
                            <h1 class="">Services</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">Services</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ls ms section_padding_top_50 section_padding_bottom_75 columns_padding_25">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="text-center">
                                <h1>Our Services</h1>
                                <div class="fw-heading">
                                    <h5>We Are Specialists In These Areas</h5>
                                </div>
                            </div>
                            <div class="row">
                                <?php
                                if (count($services) > 0) {
                                    foreach ($services as $service) {
                                ?>
                                        <div class="col-md-3 col-sm-6">
                                            <a href="view-service.php?id=<?= $service['id']; ?>">
                                                <div class="teaser text-center with_background">
                                                    <div class="teaser_icon highlight rounded-icon">
                                                        <img src="upload/service/icon/<?= $service['icon']; ?>" alt="" />
                                                    </div>
                                                    <h3 class="m-uppercase"><?= $service['title']; ?></h3>
                                                    <p><?php
                                                        if (strlen($service['description']) > 100) {
                                                            echo substr($service['description'], 0, 100) . '...';
                                                        } else {
                                                            echo $service['description'];
                                                        }
                                                        ?></p>
                                                </div>
                                            </a>

                                        </div>
                                    <?php
                                    }
                                } else {
                                    ?>
                                    <p>No any services.</p>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
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

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <!--    <script src="js/switcher.js"></script>-->

</body>


</html>