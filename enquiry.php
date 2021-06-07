<!DOCTYPE html>
<?php
include './class/include.php';

$CATEGORY = new Category(NULL);
$DISTRICT = new District(NULL);
?>

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
    <link rel="stylesheet" href="control-panel/plugins/sweetalert/sweetalert.css">
    <script src="js/vendor/modernizr-2.6.2.min.js"></script>
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
                            <form class="contact-form" method="post" action="#" id="enquiry-form">
                                <p class="contact-form-topic">
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
                                <p class="contact-form-topic">
                                    <select class="form-control" name="sub_category" id="sub_category">
                                        <option value=""> --Please Select the sub category -- </option>

                                    </select>
                                </p>
                                <p class="contact-form-topic">
                                    <select class="form-control" name="nature_of_the_work" id="nature_of_the_work">
                                        <option value=""> --Please Select the Nature of the Work -- </option>
                                        <option value="day basis"> Day Basis </option>
                                        <option value="contract"> Contract</option>
                                    </select>
                                </p>
                                <p class="contact-form-message">
                                    <textarea aria-required="true" rows="8" cols="45" name="description" id="description" class="form-control" placeholder="How we may help you"></textarea>
                                </p>
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
                                <p class="contact-form-topic">
                                    <select class="form-control" name="city" id="city">
                                        <option value=""> --Please Select the city -- </option>

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
                                
                                <div class="row col-md-12">
                                    <div class="col-md-8 col-sm-7 col-xs-6">
                                        <p class="comment-form-email">
                                            <input type="text" id="captcha" class="form-control" autocomplete="off" name="captcha" placeholder="Captcha Code">
                                        </p>
                                    </div>
                                    <div class="col-md-4 col-sm-5 col-xs-6 refresh-res code-i mb-0">
                                        <div class="form-col">
                                            <div class="mrg code-m">
                                                <?php include("./contact-form/captchacode-widget.php"); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">

                                        <p class="contact-form-submit text-center topmargin_30">
                                            <input type="hidden" name="create" value="create" />
                                            <button type="submit" id="submit" name="contact_submit" class="theme_button round-icon-big round-icon colormain colordark">Send Request<i class="rt-icon2-tick-outline"></i></button>
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

    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <script src="js/city.js"></script>
    <script src="js/sub-category.js"></script>
    <script src="js/enquiry.js"></script>
    <script src="control-panel/plugins/sweetalert/sweetalert.min.js"></script>
    <!--    <script src="js/switcher.js"></script>-->

</body>

</html>