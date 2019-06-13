<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->

<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?= $title ?></title>
	<meta name="description" content="180market" />
	<meta name="keywords" content="180market" />

	<!-- [Google Fonts Stylesheets] Starts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
	<!-- [Google Fonts Stylesheets] Ends -->

	<!-- [Fontawesome Stylesheets] Starts -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/fontawesome/css/all.min.css" >
    <!-- [Fontawesome Stylesheets] Ends -->

    <!-- Required CSS [Bootstrap Stylesheets] Starts -->
    <link href="<?php echo base_url(); ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen" />
    <!-- Required CSS [Bootstrap Stylesheets] Ends -->

    <!-- [Owl Stylesheets] Starts-->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/plugins/owlcarousel/assets/owl.theme.default.min.css">
    <!-- [Owl Stylesheets] Ends-->

    <!-- [Our Stylesheets] Starts -->
    <link href="<?php echo base_url(); ?>assets/css/stylesheet.css" rel="stylesheet" media="screen" />
    <link href="<?php echo base_url(); ?>assets/css/custom.css" rel="stylesheet" media="screen" />
    <!-- [Our Stylesheets] Ends -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.4.1.min.js" type="text/javascript"></script>
		<!-- <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.slim.min.js" type="text/javascript"></script> -->
		<script src="<?php echo base_url(); ?>assets/js/jquery.validate.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/additional-methods.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>assets/js/letter-avatar.js" type="text/javascript"></script>
        
</head>

<body>

	<header class="shadow py-2">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-3">
					<div class="logo">
						<a href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>assets/images/logo.png" title="logo" alt="logo" class="img-res"></a>
					</div>
				</div>
				<div class="col-6 col-md-9">
					<nav class="navbar navbar-expand-lg p-0">
						<div class="d-lg-none">
							<a class="navbar-brand" href="#">Categories</a>
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
								<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
							</button>
						</div>
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
							<ul class="navbar-nav mr-auto">
								<li class="nav-item">
									<a class="nav-link" href="#">About Us</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">Free Q & A</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="#">News & Articles</a>
								</li>

							</ul>
							<div class="register-block d-flex">
								<div class="dropdown login-dropdown mr-3">
									<?php
										if(isset($_SESSION['user'])){
											$user = $_SESSION['user'];
											?>
												<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<?php 
													if(isset($user['profile_image'])){
														?>
															<img class="round"  width="30" height="30" src="<?= base_url().$user['profile_image']; ?>"> <?= ucfirst($user['firstName']) ?>
														<?php
													}
													else{
														?>
															<img class="round" width="30" height="30" avatar="<?= ucfirst($user['firstName']).' '.ucfirst($user['lastName']) ?>"> <?= ucfirst($user['firstName']) ?>
														<?php	
													}
												?>
												</a>

												<div class="dropdown-menu p-2 rounded shadow-sm border-0" aria-labelledby="dropdownMenuLink">
													<a href="<?= base_url(); ?>my-account" class="btn profile-class">My account</a>
													<!-- <a href="<?= base_url(); ?>my-business-profile" class="btn profile-class">My business profile</a> -->
													<!-- <a href="<?= base_url(); ?>password-and-security" class="btn profile-class">Password and security</a> -->
													<a href="<?= base_url(); ?>logout" class="btn profile-class">Logout</a>
												</div>
											<?php
										}
										else{
											?>
												<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
												<i class="fas fa-user"></i> Log in/Register
												</a>

												<div class="dropdown-menu p-2 rounded shadow-sm border-0" aria-labelledby="dropdownMenuLink">
													<a href="<?= base_url(); ?>consumer/login" class="btn btn-primary btn-block txtwhite">Consumer</a>
													<a href="<?= base_url(); ?>service-provider/login" class="btn btn-secondary btn-block txtwhite">Service Provider</a>
												</div>		
											<?php
										}
									?>
								</div>
								<button type="button" class="btn list-buis">List Your Business</button>
							</div>
						</div>

					</nav>
				</div>
			</div>
		</div>
	</header>