<!DOCTYPE html>
<?php
include './class/include.php';
$id = '';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
}
$SERVICE = new Service($id);
?>

<head>
    <title>On Call Workers | Services | <?= $SERVICE->title; ?></title>
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

            <section class="ls ms section_padding_top_65 section_padding_bottom_75 columns_padding_25">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="row">

                                <div class="col-sm-12">
                                    <div class="row vertical-tabs">
                                        <div class="col-lg-4 col-md-5 col-sm-12">

                                            <!-- Nav tabs -->
                                            <ul class="nav m-uppercase" role="tablist">
                                                <?php
                                                $services = $SERVICE->all();
                                                if (count($services) > 1) {
                                                    foreach ($services as $key => $service) {
                                                        $active = '';
                                                        if ($service['id'] == $id) {
                                                ?>
                                                            <li class="active">
                                                                <a href="" role="tab" data-toggle="tab">
                                                                    <img src="upload/service/<?= $service['image_name']; ?>" alt="<?= $service['title']; ?>" class="service-img" /><?= $service['title']; ?>
                                                                </a>
                                                            </li>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <li class="">
                                                                <a href="view-service.php?id=<?= $service['id']; ?>">
                                                                    <img src="upload/service/<?= $service['image_name']; ?>" alt="<?= $service['title']; ?>" class="service-img" /><?= $service['title']; ?>
                                                                </a>
                                                            </li>
                                                    <?php
                                                        }
                                                    }
                                                } else {
                                                    ?>
                                                    <h6>No any services</h6>
                                                <?php
                                                }

                                                ?>
                                                
                                            </ul>
                                        </div>
                                        <div class="col-lg-8 col-md-7 col-sm-12">

                                            <article class="vertical-item post format-gallery with_background">

                                                <div class="entry-thumbnail">

                                                    <div id="carousel-generic" class="carousel slide">


                                                        <!-- Wrapper for slides -->
                                                        <div class="carousel-inner">
                                                            <?php
                                                            $SERVICE_PHOTO = new ServicePhoto(NULL);
                                                            $photos = $SERVICE_PHOTO->getServicePhotosById($id);
                                                            if (count($photos) > 0) {
                                                                foreach ($photos as $key => $photo) {
                                                                    $active = '';
                                                                    if ($key == 0) {
                                                                        $active = 'active';
                                                                    }
                                                            ?>
                                                                    <div class="item <?= $active; ?>">
                                                                        <img src="upload/service/gallery/<?= $photo['image_name']; ?>" alt="<?= $photo['caption']; ?>">
                                                                    </div>
                                                                <?php
                                                                }
                                                            } else {
                                                                ?>
                                                                <h6>No any photos</h6>
                                                            <?php
                                                            }

                                                            ?>
                                                        </div>

                                                        <!-- Controls -->
                                                        <a class="left carousel-control" href="#carousel-generic" data-slide="prev">
                                                            <span class="icon-prev"></span>
                                                        </a>
                                                        <a class="right carousel-control" href="#carousel-generic" data-slide="next">
                                                            <span class="icon-next"></span>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="item-content entry-content">
                                                    <header class="entry-header">

                                                        <h4 class="entry-title">
                                                            <?= $SERVICE->title; ?>
                                                        </h4>

                                                        <!-- .entry-meta -->

                                                    </header>
                                                    <!-- .entry-header -->

                                                    <?= $SERVICE->description; ?>



                                                </div><!-- .item-content.entry-content -->
                                            </article>

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

    <script data-cfasync="false" src="../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="js/compressed.js"></script>
    <script src="js/main.js"></script>
    <!--    <script src="js/switcher.js"></script>-->

</body>


</html>