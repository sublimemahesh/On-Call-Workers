<!DOCTYPE html>
<?php
include './class/include.php';
$COMMENT = new Comments(NULL);
$SERVICE = new Service(NULL);
$comments = $COMMENT->activeComments();
$services = $SERVICE->all();
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
            include './slider.php';
            ?>

            <?php
            include './header.php';
            ?>

            <section class="ls parallax section_padding_bottom_100 section_padding_top_100 services-section">
                <div class="container-fluid">
                    <div class="container to_animate">
                        <div class="heading-b">
                            <h3>Main Services</h3>
                            <p>With over 25 years experience and real focus on customer satisfaction, you <br /> can rely on us for your next renovation.</p>
                        </div>
                        <div class="col-sm-12 row to_animate" data-animation="scaleAppear">
                            <?php
                            if (count($services) > 0) {
                                foreach ($services as $key => $service) {
                                    if ($key < 8) {
                            ?>
                                        <div class="col-sm-3 button-block">
                                            <a href="view-service.php?id=<?= $service['id']; ?>">
                                                <!-- <i class="rt-icon2-monitor"></i> -->
                                                <img src="upload/service/<?= $service['image_name']; ?>" alt="" class="service-photo" />
                                                <br />
                                                <?= $service['title']; ?>
                                            </a>
                                        </div>
                                <?php
                                    }
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
            </section>

            <section class="ls parallax m-our-projects section_padding_top_0 section_padding_bottom_0 columns_padding_0">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12 m-projects">

                            <div class="col-sm-3">
                                <i class="rt-icon2-map2"></i>
                                <span>1240</span>
                                <h4 class="m-uppercase">Projects done</h4>
                            </div>

                            <div class="col-sm-3">
                                <i class="rt-icon2-map2"></i>
                                <span>550</span>
                                <h4 class="m-uppercase">Happy Clients</h4>
                            </div>

                            <div class="col-sm-3">
                                <i class="rt-icon2-map2"></i>
                                <span>25+</span>
                                <h4 class="m-uppercase">Years Experience</h4>
                            </div>

                            <div class="col-sm-3">
                                <i class="rt-icon2-map2"></i>
                                <span>50+</span>
                                <h4 class="m-uppercase">Business Partners</h4>
                            </div>

                        </div>
                    </div>

                </div>
            </section>
            <section class="ls ms section_padding_top_50 section_padding_bottom_40">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            <div class="owl-carousel" data-dots="false" data-nav="false" data-items="1" data-autoplay="true" data-autoplaySpeed="2300" data-responsive-lg="1" data-responsive-md="1" data-responsive-sm="1" data-responsive-xs="1">
                                <?php
                                if (count($comments) > 0) {
                                    foreach ($comments as $key => $comment) {
                                        if ($key < 6) {
                                ?>
                                            <div>
                                                <div class="testimonials">
                                                    <blockquote class="blockquote-big">
                                                        <h2>Testimonials</h2>
                                                        <?= $comment['comment']; ?>
                                                        <!-- <img class="testiminials-img left-testiminials-img" src="images/team/02.jpg" alt="" draggable="false"> -->
                                                        <img class="testiminials-img testiminials-img-main" src="upload/comments/<?= $comment['image_name']; ?>" alt="" draggable="false">
                                                        <!-- <img class="testiminials-img right-testiminials-img" src="images/team/05.jpg" alt="" draggable="false"> -->
                                                        <div>
                                                            <h6><?= $comment['name']; ?></h6><span><?= $comment['title']; ?></span>
                                                        </div>
                                                    </blockquote>
                                                </div>
                                            </div><!-- .item -->
                                    <?php
                                        }
                                    }
                                } else {
                                    ?>
                                    <h6>No any comments</h6>
                                <?php
                                }
                                ?>
                            </div><!-- .owl-carousel -->
                        </div><!-- .col- -->
                    </div><!-- .row -->
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