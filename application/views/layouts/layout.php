<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, ititial-scale=1.0">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/images/logo/favicon.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/images/logo/favicon.png') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/images/logo/favicon.png') ?>">
    <title>Уур амьсгалын өөрчлөлт, нүүрстөрөгчийн зах зээлийн хөгжлийн Ололт төв - <?= $page_title ?></title>

    <!-- Link of CSS files -->
    <link href="<?= base_url('assets/css/fontawesome-free-5.15.3-web/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/flaticon.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/remixicon.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/owl.carousel.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/owl-theme-default-min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/odometer.min.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/fancybox.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/aos.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/style.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/responsive.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/dark-theme.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/accordion.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/tablerp.css') ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/user/css/loader.css') ?>" />

    <?php if (isset($page_img) && $page_img != "") { ?>
        <!-- Facebook -->
        <meta property="og:locale" content="mn_MN" />
        <meta property="og:type" content="object">
        <meta property="og:title" content="<?= $page_title ?>">
        <meta property="og:url" content="<?= $page_url ?>">
        <meta property="og:description" content="<?= $page_description ?>">
        <meta property="og:image" content="<?= $page_img ?>">
        <meta property="og:image:secure_url" content="<?= $page_img ?>" />
        <meta property="og:image:width" content="800" />
        <meta property="og:image:height" content="450" />
        <meta property="og:site_name" content="<?= $page_title ?>" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?= $page_url ?>">
        <meta property="twitter:title" content="Ололт төв">
        <meta property="twitter:description" content="<?= $page_description ?>">
        <meta property="twitter:image" content="<?= base_url('assets/images/logo/logo.png') ?>">
    <?php } else { ?>
        <!-- Facebook -->
        <meta property="og:locale" content="mn_MN" />
        <meta property="og:type" content="object">
        <meta property="og:title" content="Ололт төв - <?= $page_title ?>">
        <meta property="og:url" content="<?= base_url() ?>">
        <meta property="og:description" content="Уур амьсгалын өөрчлөлт, нүүрстөрөгчийн зах зээлийн хөгжлийн Ололт төв">
        <meta property="og:image" content="<?= base_url('assets/images/logo/logo.png') ?>">
        <meta property="og:image:secure_url" content="<?= base_url('assets/images/logo/logo.png') ?>" />
        <meta property="og:image:width" content="800" />
        <meta property="og:image:height" content="450" />
        <meta property="og:site_name" content="Ололт төв - <?= $page_title ?>" />
        <meta property="fb:pages" content="" />

        <!-- Twitter -->
        <meta property="twitter:card" content="summary_large_image">
        <meta property="twitter:url" content="<?= base_url() ?>">
        <meta property="twitter:title" content="Ололт төв - <?= $page_title ?>">
        <meta property="twitter:description" content="Уур амьсгалын өөрчлөлт, нүүрстөрөгчийн зах зээлийн хөгжлийн Ололт төв">
        <meta property="twitter:image" content="<?= base_url('assets/images/logo/logo.png') ?>">
    <?php } ?>

    <script src="<?= base_url('assets/user/js/jquery.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/owl.carousel.min.js') ?>"></script>
</head>

<body>

    <!--Preloader starts-->
    <div class="loader js-preloader">
        <div></div>
        <div></div>
        <div></div>
    </div>


    <!-- Theme Switcher Start -->
    <div class="switch-theme-mode">
        <a class="switch-now">
            <label id="switch" class="switch">
                <input type="checkbox" onchange="toggleTheme()" id="slider" />
                <span class="slider round"></span>
                <span class="ripple"></span>
            </label>
        </a>
    </div>

    <div class="page-wrapper">
        <header class="header-wrap">
            <div class="header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-sm-6">
                            <div class="header-top-left">
                                <ul class="contact-info list-style">
                                    <li>
                                        <i class="flaticon-email-2"></i>
                                        <a href="<?= base_url('contact') ?>"><span class="__cf_email__"><?= $this->lang->line('contact') ?></span></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-bottom">
                <div class="container">
                    
                    <div class="mobile-bar-wrap">
                        <div class="mobile-menu d-lg-none">
                            <a href="javascript:void(0)"><i class="ri-menu-line"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <div class="content-wrapper">
            <?php $this->load->view($view); ?>
        </div>
        <footer class="footer-wrap">
            <div class="footer-top">
                <div class="container">
                    <div class="row pt-100 pb-75">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 pe-xl-5">
                            <div class="footer-widget">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <div class="row align-items-center">
                       
                    </div>
                </div>
            </div>
        </footer>
    </div>

    <!-- Back-to-top button Start -->
    <a href="javascript:void(0)" class="back-to-top bounce"><i class="ri-arrow-up-s-line"></i></a>

    <script>
        var owl = $('.slide-owl-carousel');
        owl.owlCarousel({
            items: 1,
            loop: true,
            dots: false,
            autoplay: true,
            autoplayTimeout: 2700,
            autoplayHoverPause: false
        });
    </script>

    <script type="text/javascript">
        function addClassElementEvent(element, className, event) {
            let elements = document.querySelectorAll(element);

            for (var i = 0; i < elements.length; i++) {
                elements[i].addEventListener(event, function(event) {
                    [].forEach.call(elements, function(el) {
                        el.classList.remove(className);
                    });
                    this.classList.add(className);
                });
            }
        }
        addClassElementEvent('.nav-link', 'active', 'click');
    </script>

    <!-- Link of JS files -->
    <script src="<?= base_url('assets/user/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/aos.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/owl-thumb.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/odometer.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/circle-progressbar.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/fancybox.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/jquery.appear.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/tweenmax.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/main.js') ?>"></script>

    <script src="<?= base_url('assets/user/js/te/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/te/jquery.nice-select.min.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/te/text_animation.js') ?>"></script>
    <script src="<?= base_url('assets/user/js/te/text_plugins.js') ?>"></script>
</body>

</html>