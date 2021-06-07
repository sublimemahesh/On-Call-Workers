<section class="intro_section page_mainslider ds">
    <div class="top-right-contact-block">
        <ul id="menu-social-menu-short" class="social-navigation">
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-783"><a href="http://facebook.com/" class="social-icon bg-icon rounded-icon soc-facebook"></a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-782"><a href="http://twitter.com/" class="social-icon bg-icon rounded-icon soc-twitter"></a></li>
            <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-784"><a href="http://skype.com/" class="social-icon bg-icon rounded-icon soc-skype"></a></li>
        </ul>
        <span class="contact-phone"> <span>0115 92 91 91</span></span>
        <span class="contact-email">Call Us 24/7 or email: <a href="#"><span class="__cf_email__" data-cfemail="#">help@oncallworkers.lk</span></a></span>
    </div>
    <div class="main-slider__scroll m-uppercase" id="main-slider__scroll">
        <a href="#scroll-down"><i class="fa fa-arrow-down"></i> <span>scroll</span></a>
    </div>
    <div class="flexslider">
        <ul class="slides">
            <?php
            $SLIDER = new Slider(NULL);
            $slider_photos = $SLIDER->all();
            foreach ($slider_photos as $photo) {
            ?>
                <li>
                    <img src="upload/slider/<?= $photo['image_name']; ?>" alt="">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="slide_description_wrapper">



                                    <div class="top-corner">
                                        <a href="./" class="logo">
                                            <img src="images/logo.png" alt="">
                                        </a>

                                    </div>
                                    <div class="slide_description">
                                        <div class="intro_slider_alt_navigation">
                                            <ul class="flex-direction-nav">
                                                <li class="flex-nav-prev"><a class="flex-prev" href="#"></a></li>
                                                <li class="flex-nav-next"><a class="flex-next" href="#"></a></li>
                                            </ul>
                                        </div>
                                        <div class="intro-layer" data-animation="slideExpandUp">
                                            <h3 class="text-uppercase topmargin_40">
                                                <?= $photo['title']; ?>
                                            </h3>
                                        </div>
                                        <div class="intro-layer" data-animation="slideExpandUp">
                                            <p class="grey bottommargin_40">
                                                <?= $photo['caption']; ?>
                                            </p>
                                        </div>
                                        <div><a href="#" target="_self" class="btn"><span><i class="rt-icon2-plus-outline"></i></span></a></div>
                                    </div> <!-- eof .slide_description -->
                                </div> <!-- eof .slide_description_wrapper -->
                            </div> <!-- eof .col-* -->
                        </div><!-- eof .row -->
                    </div><!-- eof .container -->
                </li>
            <?php
            }
            ?>
        </ul>
    </div> <!-- eof flexslider -->
</section>