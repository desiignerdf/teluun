<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8">
    <title>Sport</title>

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Theme CSS -->
    <link href="<?= base_url('assets/user/') ?>css/main.css" rel="stylesheet" media="screen">

    <!-- Favicons -->
    <link rel="shortcut icon" href="<?= base_url('assets/images/fav.png') ?>">
    <link rel="apple-touch-icon" href="<?= base_url('assets/user/') ?>img/icons/apple-touch-icon.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?= base_url('assets/images/fav.png') ?>">
    <link rel="apple-touch-icon" sizes="114x114" href="<?= base_url('assets/images/fav.png') ?>">
</head>

<body>

    <!-- layout-->
    <div id="layout">

        <!-- mainmenu-->
        <nav class="mainmenu">
            <div class="container">
                <!-- Menu-->
                <ul class="sf-menu" id="menu">
                    <li>
                        <a href="<?= base_url("/") ?>">Нүүр хуудас</a>
                    </li>

                    <li>
                        <a href="<?= base_url("/") ?>">Тэмцээний оноолт</a>
                    </li>

                </ul>
                <!-- End Menu-->
            </div>
        </nav>
        <!-- End mainmenu-->

        <!-- Mobile Nav-->
        <div id="mobile-nav">
            <!-- Menu-->
            <ul>
                <li>
                    <a href="<?= base_url("/") ?>">Нүүр хуудас</a>
                </li>
                <li>
                    <a href="<?= base_url("/") ?>">Тэмцээний оноолт</a>
                </li>
            </ul>
            <!-- End Menu-->
        </div>
        <!-- End Mobile Nav-->

        <?php $this->load->view($view); ?>

        <div class="content-instagram">
            <div id="instafeed"></div>
        </div>

        <!-- footer Down-->
        <div class="footer-down">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>&copy; 2022 Sports. All Rights Reserved</p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer Down-->
    </div>
    <!-- End layout-->

    <!-- ======================= JQuery libs =========================== -->
    <!-- jQuery local-->
    <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/jquery.js"></script>
    <!-- popper.js-->
    <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/popper.min.js"></script>
    <!-- bootstrap.min.js-->
    <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/bootstrap.min.js"></script>
    <!-- required-scripts.js-->
    <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/theme-scripts.js"></script>
    <!-- theme-main.js-->
    <script type="text/javascript" src="<?= base_url('assets/user/') ?>js/theme-main.js"></script>
    <!-- ======================= End JQuery libs =========================== -->

</body>

</html>