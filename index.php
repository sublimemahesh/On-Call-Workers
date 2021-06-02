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

            <section id="experience-main" class="ls ms section_padding_top_100 section_padding_bottom_80 hello_section">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-lg-7 to_animate">
                            <div>
                                <div class="title-block"><span class="prefix">25</span>
                                    <h3 class="sub">Years of</h3>
                                    <h1 class="title">Experience</h1>
                                </div>
                            </div>
                            <div class="fw-heading">
                                <h5>If you’re looking for reliable and trusted plumbing company we’re at Your service, providing plumbing services.</h5>
                            </div>
                            <div class="fw-divider-line">
                                <hr>
                            </div>


                            <div class="fw-iconbox clearfix ib-type1">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <div class="fw-iconbox-aside">
                                    <div class="fw-iconbox-title">
                                        <h3>CERTIFICATION</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>Plumbers certified & highly experienced professionals.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fw-iconbox clearfix ib-type1">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div class="fw-iconbox-aside">
                                    <div class="fw-iconbox-title">
                                        <h3>24/7 Opened</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>Have a problem with your plumbing at night, call us!</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fw-iconbox clearfix ib-type1">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <div class="fw-iconbox-aside">
                                    <div class="fw-iconbox-title">
                                        <h3>Fair Prices</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>We aren’t cheapest, but we won’t ruin your wallet either.</p>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>

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

            <section id="experience-main" class="ls ms section_padding_top_65 section_padding_bottom_65 hello_section_2">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-12 to_animate">
                            <div class="hello_heading_2">
                                <div class="title-block">
                                    <h3 class="text-center">HOW IT WORKS</h3>
                                </div>
                                <div class="fw-heading fw-heading-h5  ">
                                    <h5 class="fw-special-title text-center">If you’re looking for reliable and trusted plumbing company we’re at Your service, providing plumbing services.</h5>
                                </div>
                                <div class="fw-divider-line"></div>
                            </div>
                            <hr>

                            <div class="fw-iconbox clearfix text-center col-sm-4">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-file-text-o"></i>
                                </div>
                                <div>
                                    <div class="fw-iconbox-title">
                                        <h3 class="m-uppercase">CERTIFICATION</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>Plumbers certified & highly experienced professionals. We’ll solve Yor problem.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fw-iconbox clearfix text-center col-sm-4">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <div>
                                    <div class="fw-iconbox-title">
                                        <h3 class="m-uppercase">24/7 Opened</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>Have a problem with your plumbing at night, call us! We’ll solve Yor problem.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="fw-iconbox clearfix text-center col-sm-4">
                                <div class="fw-iconbox-image">
                                    <i class="fa fa-thumbs-o-up"></i>
                                </div>
                                <div>
                                    <div class="fw-iconbox-title">
                                        <h3 class="m-uppercase">Fair Prices</h3>
                                    </div>
                                    <div class="fw-iconbox-text">
                                        <p>We aren’t cheapest, but we won’t ruin your wallet either. We promise!</p>
                                    </div>
                                </div>
                            </div>
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