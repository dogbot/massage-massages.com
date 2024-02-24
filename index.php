<?php
include("cms/_cms.php");
$page_type = "home";
$page_description = "Massage and Spa Services";
?>

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $site_name; ?> - <?= $page_description;?> <?= $page_type ?></title>
    <meta name="author" content="MassAll">
    <meta name="description" content="<?= $site_name; ?> - <?= $page_description;?>
    <meta name="keywords" content="beauty, beauty salon, beauty shop, beauty spa, cosmetics, hairdresser, health, lifestyle, massage, salon, spa, spa booking, wellness, wellness template, yoga">
    <meta name="robots" content="INDEX,FOLLOW">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
    <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">

    <!--==============================
	  Google Fonts
	============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&family=Marcellus&display=swap" rel="stylesheet">


    <!--==============================
	    All CSS File
	============================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="assets/css/app.min.css"> -->
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">
    <!-- Layerslider -->
    <link rel="stylesheet" href="assets/css/layerslider.min.css">
    <!-- jQuery DatePicker -->
    <link rel="stylesheet" href="assets/css/jquery.datetimepicker.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/magnific-popup.min.css">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="assets/css/slick.min.css">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>


<body>


    <!--[if lte IE 9]>
    	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->



    <!--********************************
   		Code Start From Here 
	******************************** -->




    <!--==============================
     Preloader
  ==============================-->
    <div class="preloader  ">
        <button class="vs-btn preloaderCls">Cancel Preloader </button>
        <div class="preloader-inner">
            <div class="loader"></div>
        </div>
    </div><svg viewBox="0 0 150 150" class="svg-hidden">
        <path id="textPath" d="M 0,75 a 75,75 0 1,1 0,1 z"></path>
    </svg><!--==============================
    Mobile Menu
  ============================== -->
    <div class="vs-menu-wrapper">
        <div class="vs-menu-area text-center">
            <button class="vs-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo">
                <a href="index.html"><img src="assets/img/logo.svg" alt="<?= $site_name; ?>"></a>
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
                                <?= $cms_info_street; ?>
                                <?= $cms_info_media_city; ?>
                                <?= $cms_info_media_st; ?>
                                <?= $cms_info_media_pc; ?>
                                <?= $cms_info_media_country; ?>
                            </li>
                            <?php if(!empty($cms_info_media_email_link )){?>
                                <li><i class="far fa-phone-alt"></i><a href="tel:<?= $cms_info_media_phone_link; ?>"><?= $cms_info_media_phone_formatted; ?></a></li>
                                <?php };?>
                                <?php if(!empty($cms_info_media_email_link )){?>    
                                <li><i class="far fa-envelope"></i><a href="mailto:<?= $cms_info_media_email_link; ?>"><?= $cms_info_media_email_formatted; ?></a></li>
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
                <h1 class="breadcumb-title"><?= $cms_hero_title ;?></h1>
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
                        <h2 class="form-title">Book Appointment</h2>
                        <p class="form-label">Today For Free</p>
                        <div class="form-group">
                            <input type="text" name="name" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" id="email" placeholder="Email Address">
                        </div>
                        <div class="form-group">
                            <input type="number" name="number" id="number" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <input type="text" name="date" id="date" autocomplete="off" class="form-control dateTime-pick" placeholder="Select Date">
                        </div>
                        <div class="form-group">
                            <select name="subject" id="subject">
                                <option disabled hidden selected>SELECT SERVICE</option>
                                <?php
                                echo '<option>' . implode( ' massage</option><option>', $cms_massage_types) . ' massage</option>';
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="vs-btn" type="submit">Make Appointment</button>
                        </div>
                        <p class="form-messages">

                       
                        </p>
                    </form>
                </div>
                <div class="col-xl-7 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="row">
                        <div class="col-12 mb-5">
                            <h2 class="h3 mb-4 mt-n2"><?= $cms_val_title ?></h2>
                            <p class="fs-md font-title mb-4"><?= $cms_val_description ?></p>
                            <div class="row gy-2">

                                <?php if(!empty($cms_info_media_email_link )){?>
                                    <div class="col-auto">
                                        <p class="vs-info"><i class="fal fa-envelope"></i><a href="mailto:<?= $cms_info_media_email_link;?>" class="text-inherit"><?= $cms_info_media_email_formatted;?></a></p>
                                    </div>
                                <?php };?>

                                <?php if(!empty($cms_info_media_phone_link )){?>
                                    
                                    <div class="col-auto">
                                        <p class="vs-info"><i class="fal fa-phone-alt"></i><a href="tel:<?= $cms_info_media_phone_link;?>" class="text-inherit"><?= $cms_info_media_phone_formatted;?></a></p>
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
    <section class=" space area_testimonial">
        <div class="parallax" data-parallax-image="assets/img/bg/testi-bg-2-1.jpg"></div>
        <div class="shape-mockup jump-reverse d-none d-xxl-block" data-top="12%" data-right="6%"><img src="assets/img/shape/leaf-1-1.png" alt="shape"></div>
        <div class="shape-mockup jump  d-none d-xxl-block" data-top="35%" data-left="17.5%"><img src="assets/img/shape/leaf-1-8.png" alt="shape"></div>
        <div class="container">
            <div class="title-area text-center">
                <span class="sec-subtitle">client testimonial</span>
                <h2 class="sec-title"><?= $site_name; ?> Customers</h2>
            </div>
            <div class="pb-1px"></div>
            <div class="testi-style2">
                <span class="vs-icon"><img src="assets/img/icon/quote-1-1.png" alt="icon"></span>
                <div class="vs-carousel" data-slide-show="1" data-fade="true" data-arrows="true" data-ml-arrows="true" data-xl-arrows="true" data-lg-arrows="true" data-prev-arrow="fal fa-long-arrow-left" data-next-arrow="fal fa-long-arrow-right">
                trust-partners verified<?php
foreach ($json_testimonials_data['testimonials'] as $testimonial) {?>

    <div>
                        <p class="testi-text"><?= $testimonial['content']?></p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5"><?=$testimonial['author']?></h3>
                        <span class="testi-degi"><?=$testimonial['other']?></span>
                    </div>

<?php }?>
                    <!-- <div>
                        <p class="testi-text">“Creation timelines for the standard lorem ipsum passage vary, with some citing the 15th century and others the part of Cicero”</p>
                        <div class="arrow-shape"><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i><i class="arrow"></i></div>
                        <h3 class="testi-name h5">Vivi Marian</h3>
                        <span class="testi-degi">Customer</span>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!--==============================
			Footer Area
	==============================-->
<?php
include("parts/footer/footer.php");
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