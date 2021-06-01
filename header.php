<header id="scroll-down" class="page_header header_white floating_logo columns_padding_0 table_section">
    <div class="container-fluid">
        <div class="row">
            <div class="top-main-menu text-left">
                <!-- main nav start -->
                <nav class="mainmenu_wrapper">
                    <ul class="mainmenu nav sf-menu">
                        <li class="active">
                            <a href="index.php">Home</a>

                        </li>

                        <li>
                            <a href="about.php">About Us</a>

                        </li>
                        <!-- eof pages -->

                        <li>
                            <a href="services.php">Services</a>
                            <ul>
                                <?php
                                $H_SERVICE = new Service(NULL);
                                $services = $H_SERVICE->all();
                                foreach ($services as $service) {
                                ?>
                                    <li>
                                        <a href="view-service.php?id=<?= $service['id']; ?>"><?= $service['title']; ?></a>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </li>

                        <!-- blog -->
                        <li>
                            <a href="customer-feedback.php">Customer Feedback</a>

                        </li>
                        <!-- eof blog -->

                        <!-- contacts -->       
                        <li>
                            <a href="contatct-us.php">Contact Us</a>
                        </li>
                        <!-- eof contacts -->

                    </ul>
                </nav>
                <!-- eof main nav -->
                <span class="toggle_menu"><span></span></span>
            </div>



            <div class="top-menu-buttons text-center">
                <ul class="inline-dropdown inline-block">

                    <li class="dropdown login-dropdown right">

                        <a class="header-button" id="login" href="worker-registration.php">
                            <img src="images/worker-icon.jpg" alt="Worker registration" class="worker-reg-icon" />
                        </a>
                    </li>

                </ul>

            </div>
            <div class="qoute-header dropdown">
                <a class="header-button" data-target="#" href="enquiry.php" aria-haspopup="true" role="button" aria-expanded="false">Get a Quote<br>
                   
                </a>
               
            </div> 
        </div>
    </div>
</header>