<!DOCTYPE html>
<?php
include './class/include.php';
$COMMENT = new Comments(NULL);
$comments = $COMMENT->activeComments();
?>

<head>
    <title>On Call Workers | Customer Feedback</title>
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
                            <h1 class="">Customer Feedback</h1>
                            <ol class="breadcrumb">
                                <li>
                                    <a href="./">
                                        Home
                                    </a>
                                </li>

                                <li class="active">Customer Feedback</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </section>

            <section class="ls ms section_padding_top_15 section_padding_bottom_50 columns_padding_25">
                <div class="container">
                    <div class="row">

                        <div class="col-sm-10 col-sm-push-1">
                            <div class="comments-area" id="comments">
                                <ol class="comment-list">
                                    <?php
                                    if (count($comments) > 0) {
                                        foreach ($comments as $comment) {
                                    ?>
                                            <li class="comment even thread-even depth-1 parent">
                                                <article class="comment-body media">
                                                    <div class="media-left">
                                                        <img class="media-object" alt="" src="upload/comments/<?= $comment['image_name']; ?>">
                                                    </div>
                                                    <div class="media-body">
                                                        <div class="comment-meta">
                                                            <a class="author_url" rel="external nofollow" href="#"><?= $comment['name']; ?></a>
                                                            <span class="comment-date">
                                                                <time class="entry-date"><?= $comment['title']; ?></time>
                                                            </span>
                                                        </div>
                                                        <?= $comment['comment']; ?>
                                                    </div>
                                                </article>
                                                <!-- .comment-body -->

                                            </li>
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <h6>No any comments</h6>
                                    <?php
                                    }
                                    ?>
                                </ol>
                                <!-- .comment-list -->
                            </div>
                            <div class="text-center">
                                <h3>Add Your Feedback</h3>
                                
                            </div>
                            <!-- #comments -->
                            <div class="comment-respond" id="respond">
                                <form class="comment-form" id="form-data" method="POST" enctype="multipart/form-data">
                                    <div class="row columns_padding_5">
                                        <div class="col-md-12">
                                            <p class="comment-form-author">
                                                <input type="text" id="name" class="form-control" autocomplete="off" name="name" placeholder="Your Name">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-email">
                                                <input type="text" id="title" class="form-control" autocomplete="off" name="title" placeholder="Title">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-website">
                                                <input type="file" id="image" class="form-control" name="image">
                                            </p>
                                        </div>
                                        <div class="col-md-12">
                                            <p class="comment-form-chat">
                                                <textarea id="comment" name="comment" class="form-control" rows="5" placeholder="Comment..."></textarea>
                                                <input type="hidden" value="1" name="active" />
                                            </p>
                                        </div>
                                        <div class="row col-md-12">
                                            <div class="col-md-9 col-xs-6">
                                                <p class="comment-form-email">
                                                    <input type="text" id="captcha" class="form-control" autocomplete="off" name="captcha" placeholder="Captcha Code">
                                                </p>
                                            </div>
                                            <div class="col-md-3 col-xs-6 refresh-res code-i mb-0">
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
                                            <button id="submit" type="submit" value="create" class="theme_button round-icon round-icon-big colormain2">Add Your Feedback<i class="rt-icon2-tick-outline"></i></button>
                                        </p>
                                    </div>

                                </form>
                            </div>
                            <!-- #respond -->


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

    <script src="js/comment.js" type="text/javascript"></script>
    <!--    <script src="js/switcher.js"></script>-->

</body>


</html>