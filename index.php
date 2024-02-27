<?php
include("cms/_site.php");

include("cms/cms.php");
include("cms/head.php");
include("parts/components/preloader.php");
?>


<!--==============================
    Mobile Menu
============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="assets/img/logo.svg" alt="<?PHP echo $site_name; ?>"></a>
            </div>
            <!-- menu here -->
            <!--?php include '/parts/menu.php'; ?> -->
        </div>
    </div>
<!--==============================
    Sidemenu php
============================== -->

    <!--==============================
    Popup Search Box php here
    ============================== -->

    <!--==============================
    Header Area
    ==============================-->
    <header class="vs-header header-layout3">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center justify-content-md-between align-items-center">
                    <div class="col-auto text-center py-2 py-md-0">
                        <div class="header-links style-white">
                            <ul>
                                <li class="d-none d-xxl-inline-block"><i class="far fa-map-marker-alt"></i>
                               
                                <?PHP echo $cms_city; ?>
                                <?PHP echo $cms_st; ?> - 
                                <?PHP echo $cms_country; ?>
                            </li>
                            <?php if(!empty($site_email )){?>
                                <li><i class="far fa-phone-alt"></i><a href="tel:<?PHP $site_phone; ?>"><?PHP $site_phone; ?></a></li>
                                <?php };?>
                                <?php if(!empty($site_email )){?>    
                                <li><i class="far fa-envelope"></i><a href="mailto:<?PHP $site_email; ?>"><?PHP $site_email; ?></a></li>
                                <?php };?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-auto d-none d-md-block">
                        <div class="social-style1">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                            <a href="#"><i class="fab fa-google"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="sticky-wrap">
            <div class="sticky-active">
                <div class="container">
                    <div class="row justify-content-between align-items-center gx-60">
                        <div class="col">
                            <div class="header-logo">
                                <a href="index.html"><img src="assets/img/logo.svg" alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto">
<!-- nav -->
                        </div>
                        <div class="col-auto">
                            <div class="header-icons">
                                <!-- <button class="searchBoxTggler"><i class="far fa-search"></i></button> -->
                                <a href="contact.html" class="vs-btn style2 d-none d-xl-inline-block">Book</a>
                                <!-- <button class="bar-btn sideMenuToggler d-none d-xl-inline-block">
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                    <span class="bar"></span>
                                </button>
                                <button class="vs-menu-toggle d-inline-block d-lg-none" type="button"><i class="fal fa-bars"></i></button> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

<!--==============================
    Breadcumb
============================== -->
    <div class="breadcumb-wrapper " data-bg-src="assets/img/breadcumb/breadcumb-bg-<?php echo(rand(1,4));?>.jpg">
        <div class="container z-index-common">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title"><?PHP echo $cms_hero_title ;?></h1>
                <div class="breadcumb-menu-wrap">
                    <ul class="breadcumb-menu">
                    <?php
                    echo '<li>' . implode( '</li><li>', $cms_hero_breadcrum) . '</li>';
                    ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<!--==============================
    Appointment Area
    ==============================-->
    <section class="bg-light-3 space">
        <div class="shape-mockup jump-img d-none d-xxl-block" data-right="4%" data-top="10%"><img src="assets/img/shape/leaf-1-5.png" alt="shape"></div>
        <div class="shape-mockup jump-reverse-img d-none d-xxl-block" data-right="2%" data-bottom="5%"><img src="assets/img/shape/b-s-1-3.png" alt="shape"></div>
        <div class="shape-mockup jump-reverse-img d-none d-xxl-block" data-left="0" data-bottom="4%"><img src="assets/img/shape/b-s-1-2.png" alt="shape"></div>
        <div class="container">
            <div class="row gx-60">
                <div class="col-xl-5 mb-40 mb-xl-0 pb-20 pb-xl-0 wow fadeInUp" data-wow-delay="0.2s">
                    <form action="leads.php" class="form-style2   appointment-form">
                     <?php foreach ($locationData as $field => $value) { ?>
                        <input type="hidden" name="api<?php echo $field; ?>" id="api<?php echo $field; ?>" value="<?php echo $value; ?>">
                    <?php } ?>
                        <input type="hidden" name="leadSource" value="<?php echo $site_domain;?>">
                        <input type="hidden" name="serverTime" value="<?php echo $serverTime ;?>">
                        <input type="hidden" name="clientTime" id="clientTime">
                        
                        <h2 class="form-title">Book Appointment</h2>
                        <p class="form-label">Today For Free</p>
                        <div class="form-group">
                            <input type="text" name="clientName" id="clientName" autocomplete="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="clientEmail" id="clientEmail" autocomplete="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="clientNumber" name="clientNumber" id="clientNumber" autocomplete="tel" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="serviceLocation" id="serviceLocation"  autocomplete="city" placeholder="City or Postal Code">
                        </div>
                        <div class="form-group">
                            <select name="serviceRequested" id="serviceRequested">
                                <option disabled hidden selected>SELECT SERVICE</option>
                                <?php
                                echo '<option>' . implode( ' massage</option><option>', $cms_massage_types) . ' massage</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="vs-btn" type="submit">Make Appointment</button>
                        </div>
                        <p class="form-messages"></p>
                    </form>
                </div>
                <div class="col-xl-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h2 class="h3 mb-4 mt-n2"><?PHP echo $cms_val_title ?></h2>
                            <p class="fs-md font-title mb-4"><?PHP echo $cms_val_description ?></p>
                            <div class="row gy-2">

                                <?php if(!empty($site_email )){?>
                                    <div class="col-auto">
                                        <p class="vs-info"><i class="fal fa-envelope"></i><a href="mailto:<?PHP echo $site_email;?>" class="text-inherit"><?PHP $site_email;?></a></p>
                                    </div>
                                <?php };?>

                                <?php if(!empty($site_phone )){?>
                                    
                                    <div class="col-auto">
                                        <p class="vs-info"><i class="fal fa-phone-alt"></i><a href="tel:<?PHP echo $site_phone;?>" class="text-inherit"><?PHP $site_phone;?></a></p>
                                    </div>
                                <?php };?>

                            </div>
                        </div>
                        <div class="col-md-7 mb-30">
                            <img src="assets/img/about/appoin-1-2.jpg" alt="about" class="w-100">
                        </div>
                        <div class="col-md-5 mb-30">
                            <img src="assets/img/about/appoin-1-1.jpg" alt="about" class="w-100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!--==============================
    Price Plan Area
    ==============================-->



    <!--==============================
    Testimonial Area
    ==============================-->
    <?php
    include("parts/components/testimonials.php");
    ?>
    <!--==============================
			Footer Area
	==============================-->
    <?php
    include("parts/layout/footer.php");
    ?>
    <!--********************************
			Code End  Here 
	******************************** -->

    <!--==============================
        All Js File
    ============================== -->
    <!-- Jquery -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery UI -->
    <script src="assets/js/jquery-ui.min.js"></script>
    <!-- Slick Slider -->
    <script src="assets/js/slick.min.js"></script>
    <!-- <script src="assets/js/app.min.js"></script> -->

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- Parallax Scroll -->
    <script src="assets/js/universal-parallax.min.js"></script>
    <!-- Wow.js Animation -->
    <script src="assets/js/wow.min.js"></script>
    <!-- jQuery Datepicker -->
    <script src="assets/js/jquery.datetimepicker.min.js"></script>
    <!-- Magnific Popup -->
    <script src="assets/js/jquery.magnific-popup.min.js"></script>
    <!-- Isotope Filter -->
    <script src="assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="assets/js/isotope.pkgd.min.js"></script>
    <!-- Main Js File -->
    <script src="assets/js/main.js"></script>


</body>

</html>