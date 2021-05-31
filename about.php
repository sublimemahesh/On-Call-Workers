
<!DOCTYPE html>
<?php
include './class/include.php';

$ABOUT = new Page(1);
$VISION = new Page(2);
$MISSION = new Page(2);
?>
<head>
    <title>On Call Workers</title>
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
                            <h1 class="">About</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">About</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ls ms section_padding_top_100 section_padding_bottom_75 about-page-top all-h-dark">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 to_animate">
                            <div class="side-item content-padding">

                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6">
                                        <div>
                                            <div>
                                                <div>
                                                    <div class="title-block"><span class="prefix">HI</span><h3 class="sub">Years of</h3><h1 class="title">About Us</h1>
                                                    </div>
                                                </div>
                                                <div>
                                                    <?= $ABOUT->description; ?>
                                                </div> 
                                                <div class="row">
                                                    <div class="tab-content no-border">

                                                        <div class="tab-pane fade in active" id="vertical-tab1">
                                                            <div class="padding-top-30">
                                                                <div class="panel-group accordion-big" id="accordion1">
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse1" class="collapsed">
                                                                                    VISION
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse1" class="panel-collapse collapse in">
                                                                            <div class="panel-body">
                                                                            <?= $VISION->description; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="panel panel-default">
                                                                        <div class="panel-heading">
                                                                            <h4 class="panel-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse2" class="collapsed">
                                                                                    MISSION
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapse2" class="panel-collapse collapse">
                                                                            <div class="panel-body">
                                                                            <?= $MISSION->description; ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- .row -->
                                            </div>
                                        </div>

                                    </div>
                                </div>
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

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
<!--    <script src="js/switcher.js"></script>-->

</body>


</html>