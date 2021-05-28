<!DOCTYPE html>

<head>
    <title>On Call Workers | Enquiry</title>
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
                            <h1 class="">Enquiry</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">Enquiry</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>




            <section class="ls  section_padding_top_75 section_padding_bottom_15">
                <div class="container">


                    <div class="row">
                        <div class="col-sm-12 to_animate">
                            <form class="contact-form" method="post" action="#">
                                 <p class="contact-form-topic">
                                    <select class="form-control" name="type" id="service_type">
                                        <option value=""> --Please Select the service type -- </option>
                                        <option value="id">
                                            Computer Repair
                                        </option> 
                                    </select>
                                </p>

                                <p class="contact-form-name">
                                    <input type="text" aria-required="true" size="30" value="" name="name" id="name" class="form-control" placeholder="Name">
                                </p>
                                <p class="contact-form-email">
                                    <input type="email" aria-required="true" size="30" value="" name="email" id="email" class="form-control" placeholder="Email Adress">
                                </p>
                                <p class="contact-form-phone">
                                    <input type="text" aria-required="true" size="30" value="" name="phone" id="phone" class="form-control" placeholder="Phone Number">
                                </p>
                              
                                <p class="contact-form-topic">
                                    <select class="form-control" name="type" id="city_type">
                                        <option value=""> --Please Select the city -- </option>
                                        <option value="id">
                                            Galle
                                        </option> 
                                    </select>
                                </p>

                                <p class="contact-form-message">
                                    <textarea aria-required="true" rows="8" cols="45" name="job_description" id="message" class="form-control" placeholder="Job Description"></textarea>
                                </p>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <p class="contact-form-submit text-center topmargin_30">
                                            <button type="submit" id="contact_form_submit" name="contact_submit" class="theme_button round-icon-big round-icon colormain colordark">Send Request<i class="rt-icon2-tick-outline"></i></button>
                                        </p>
                                    </div>

                                </div>
                            </form>
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