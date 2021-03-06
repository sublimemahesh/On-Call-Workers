<!DOCTYPE html>
<?php
include './class/include.php';
?>

<head>
    <title>On Call Workers | Contact Us</title>
    <meta charset="utf-8">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="images/f-icon.png" type="image/x-icon.">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/main.css" id="color-switcher-link">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="control-panel/plugins/sweetalert/sweetalert.css">
    <link rel="stylesheet" href="contact-form/style.css">
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
                            <h1 class="">Contact Us</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">Contact Us</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>


            <section class="ls section_padding_top_65 section_padding_bottom_50">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 to_animate" data-animation="pullDown">
                            <div class="teaser text-center">
                                <div class="m-uppercase">
                                    <h3>Address</h3>
                                </div>

                                <p>
                                    No.1079 B, Kumaragewatte Rd, Thalawatugoda.
                                </p>

                            </div>
                        </div>
                        <div class="col-sm-4 to_animate" data-animation="pullDown">
                            <div class="teaser text-center">
                                <div class="m-uppercase">
                                    <h3>Opening Hours</h3>
                                </div>
                                <p>
                                    Weekdays 8:00 - 17:00 <br>
                                    Saturday 10:00 - 12:00 <br>
                                    Sunday Closed
                                </p>
                            </div>
                        </div>

                        <div class="col-sm-4 to_animate" data-animation="pullDown">
                            <div class="teaser text-center">
                                <div class="m-uppercase">
                                    <h3>Contact Us</h3>
                                </div>
                                <a href="tel:+942775875">
                                    <p class="footer-text">0115 92 91 91</p>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            <section class="ls ms section_padding_top_75 section_padding_bottom_15">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-6 to_animate">
                            <form class="contact-form columns_padding_5" method="post" action="#" id="form-data">


                                <div>
                                    <p class="contact-form-name">
                                        <input type="text" aria-required="true" size="30" value="" name="txtFullName" id="txtFullName" class="form-control" placeholder="Full Name">
                                        <span id="spanFullName"></span>
                                    </p>
                                    <p class="contact-form-name">
                                        <input type="text" aria-required="true" size="30" value="" name="txtPhone" id="txtPhone" class="form-control" placeholder="phone">
                                        <span id="spanPhone"></span>
                                    </p>
                                    <p class="contact-form-email">
                                        <input type="email" aria-required="true" size="30" value="" name="txtEmail" id="txtEmail" class="form-control" placeholder="Email">
                                        <span id="spanEmail"></span>
                                    </p>
                                </div>

                                <div>

                                    <p class="contact-form-message">
                                        <textarea aria-required="true" rows="6" cols="45" name="txtMessage" id="txtMessage" class="form-control" placeholder="Message"></textarea>
                                        <span id="spanMessage"></span>
                                    </p>
                                </div>
                                <div class="row col-md-12">
                                    <div class="col-md-8">
                                        <p class="contact-form-captcha">
                                            <input type="text" id="captchacode" class="form-control" autocomplete="off" name="captchacode" placeholder="Captcha Code">
                                            <span id="capspan"></span>
                                        </p>
                                    </div>
                                    <div class="col-md-4 refresh-res code-i mb-0">
                                        <div class="form-col">
                                            <div class="mrg code-m">
                                                <?php include("./contact-form/captchacode-widget.php"); ?>
                                            </div>
                                        </div>
                                        <img id="checking" src="contact-form/img/checking.gif" alt="" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <p class="contact-form-submit text-center topmargin_30">
                                            <button type="submit" id="btnSubmit" name="contact_submit" class="theme_button round-icon-big round-icon colormain and-white">Send Message<i class="rt-icon2-tick-outline"></i></button>
                                        </p>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <div class="col-sm-6">
                            <section id="map">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3961.1497751299416!2d79.93689421427673!3d6.872650995033594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2509373cf883b%3A0x3ac2385f8b347f26!2s321%20Uthuwankanda%20Rd%2C%20Sri%20Jayawardenepura%20Kotte!5e0!3m2!1sen!2slk!4v1621484880824!5m2!1sen!2slk" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" class="map"></iframe>
                            </section>
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

    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <script src="control-panel/plugins/sweetalert/sweetalert.min.js"></script>
    <script src="contact-form/scripts.js"></script>
    <!--    <script src="js/switcher.js"></script>-->

</body>


</html>