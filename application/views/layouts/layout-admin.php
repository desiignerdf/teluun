<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Админ хуудас</title>
	<!-- Favicon icon -->
	<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url("assets/images/fav.png") ?>">
	<link href="<?= base_url("assets/admin/") ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url("assets/admin/") ?>vendor/chartist/css/chartist.min.css">
	<!-- Vectormap -->
	<link href="<?= base_url("assets/admin/") ?>vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link href="<?= base_url("assets/admin/") ?>vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
	<link href="<?= base_url("assets/admin/") ?>css/style.css" rel="stylesheet">
	<link href="<?= base_url("assets/admin/") ?>vendor/owl-carousel/owl.carousel.css" rel="stylesheet">

	<link href="<?= base_url('summernote/summernote.min.css?v=' . time()) ?>" rel="stylesheet">
	<link href="<?= base_url('assets/admin/css/summernote-ext-ajaximageupload.css?v=' . time()) ?>" rel="stylesheet">
	<script type="text/javascript" src="<?= base_url('summernote/summernote.min.js?v=' . time()) ?>"></script>
	<script type="text/javascript" src="<?= base_url('assets/admin/js/summernote-ext-ajaximageupload.js?v=' . time()) ?>"></script>

	<script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
</head>
<div class="content-wrapper">

	<body>
		<div id="preloader">
			<div class="sk-three-bounce">
				<div class="sk-child sk-bounce1"></div>
				<div class="sk-child sk-bounce2"></div>
				<div class="sk-child sk-bounce3"></div>
			</div>
		</div>
		<div id="main-wrapper">
			<div class="nav-header">
				<a href="<?= base_url('admin/dashboard') ?>" class="brand-logo" style="color: #000; font-size: 24px;">
					Sport
				</a>

				<div class="nav-control">
					<div class="hamburger">
						<span class="line"></span><span class="line"></span><span class="line"></span>
					</div>
				</div>
			</div>

			<div class="header">
				<div class="header-content">
					<nav class="navbar navbar-expand">
						<div class="collapse navbar-collapse justify-content-between">
							<div class="header-left">
								<div class="dashboard_bar">

								</div>
							</div>
							<ul class="navbar-nav header-right">
								<li class="nav-item dropdown header-profile">
									<a class="nav-link" href="javascript:void(0)" role="button" data-bs-toggle="dropdown">
										<div class="header-info">
											<span class="text-black">
												<strong>
													<?php
													if (isset($_SESSION['cccmdc_logged_in']) && $_SESSION['cccmdc_logged_in'] === true) {
														echo $_SESSION['cccmdc_lastname'] . ' ' . $_SESSION['cccmdc_firstname'];
													} else {
														echo 'Admin';
													}
													?>
												</strong>
											</span>
										</div>
										<img src="<?= base_url("assets/admin/") ?>images/profile/17.jpg" width="20" alt="" />
									</a>

									<div class="dropdown-menu dropdown-menu-end">
										<a href="<?= base_url('admin/user/edit/') . $_SESSION['cccmdc_user_id'] ?>" class="dropdown-item ai-icon">
											<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
												<circle cx="12" cy="7" r="4"></circle>
											</svg>
											<span class="ms-2">Тохиргоо </span>
										</a>
										<a href="<?= base_url("admin/logout") ?>" class="dropdown-item ai-icon">
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
												<path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
												<polyline points="16 17 21 12 16 7"></polyline>
												<line x1="21" y1="12" x2="9" y2="12"></line>
											</svg>
											<span class="ms-2">Гарах </span>
										</a>
									</div>
								</li>
							</ul>
						</div>
					</nav>
				</div>
			</div>

			<div class="deznav">
				<div class="deznav-scroll">
					<ul class="metismenu" id="menu">
						<!-- <li <?php if ($this->uri->segment(2) == 'content') {
										echo 'class="active"';
									} ?>><a href="<?= base_url('admin/content') ?>"><i class="fas fa-list-ol fa-lg"></i> <span>Мэдээ</span></a>
						</li>
						<li <?php if ($this->uri->segment(2) == 'category') {
								echo 'class="active"';
							} ?>><a href="<?= base_url('admin/category') ?>" class="padding-left:20px"><i class="fas fa-list fa-lg"></i>
								<span>Ангилал</span></a>
						</li> -->
						<li <?php if ($this->uri->segment(2) == 'dashboard') {
								echo 'class="mm-active"';
							} ?>><a href="<?= base_url('admin/dashboard') ?>" class="ai-icon" aria-expanded="false">
								<i class="flaticon-381-networking"></i>
								<span class="nav-text">Хянах самбар</span>
							</a>
						</li>

						<li <?php if ($this->uri->segment(2) == 'competition_category') {
								echo 'class="mm-active"';
							} ?>><a href="<?= base_url('admin/competition_category') ?>" class="ai-icon" aria-expanded="false">
								<i class="flaticon-381-notepad"></i>
								<span class="nav-text">Тэмцээн</span>
							</a>
						</li>

						<li <?php if ($this->uri->segment(2) == 'competition') {
								echo 'class="mm-active"';
							} ?>><a href="<?= base_url('admin/competition') ?>" class="ai-icon" aria-expanded="false">
								<i class="flaticon-381-notepad"></i>
								<span class="nav-text">Тэмцээний оноолт</span>
							</a>
						</li>

						<li <?php if ($this->uri->segment(2) == 'content') {
								echo 'class="mm-active"';
							} ?>><a href="<?= base_url('admin/content') ?>" class="ai-icon" aria-expanded="false">
								<i class="flaticon-381-network"></i>
								<span class="nav-text">Мэдээ</span>
							</a>
						</li>

						<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
								<i class="flaticon-381-layer-1"></i>
								<span class="nav-text">Лавлах</span>
							</a>
							<ul aria-expanded="false">
								<li><a href="<?= base_url('admin/category') ?>">Ангилал</a></li>
								<li><a href="<?= base_url('admin/teams') ?>">Баг</a></li>
							</ul>
						</li>
					</ul>


				</div>
			</div>

			<?php $this->load->view($view); ?>


		</div>
		<script src="<?= base_url("assets/admin/") ?>vendor/global/global.min.js"></script>
		<script src="<?= base_url("assets/admin/") ?>vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
		<script src="<?= base_url("assets/admin/") ?>vendor/chart.js/Chart.bundle.min.js"></script>
		<script src="<?= base_url("assets/admin/") ?>vendor/owl-carousel/owl.carousel.js"></script>

		<script src="<?= base_url("assets/admin/") ?>vendor/peity/jquery.peity.min.js"></script>

		<script src="<?= base_url("assets/admin/") ?>vendor/apexchart/apexchart.js"></script>

		<script src="<?= base_url("assets/admin/") ?>js/dashboard/dashboard-1.js"></script>

		<script src="<?= base_url("assets/admin/") ?>js/custom.min.js"></script>
		<script src="<?= base_url("assets/admin/") ?>js/deznav-init.js"></script>
		<script src="<?= base_url("assets/admin/") ?>js/demo.js"></script>

	</body>

</html>