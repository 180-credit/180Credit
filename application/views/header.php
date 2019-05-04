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
	<title><?= $title; ?></title>
	<meta name="description" content="180market" />
	<meta name="keywords" content="180market" />

	<!-- [Google Fonts Stylesheets] Starts -->
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300' rel='stylesheet' type='text/css'>
	<!-- [Google Fonts Stylesheets] Ends -->

	<!-- [Fontawesome Stylesheets] Starts -->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
	<!-- [Fontawesome Stylesheets] Ends -->

	<!-- Required CSS [Bootstrap Stylesheets] Starts -->
	<link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen" />
	<!-- Required CSS [Bootstrap Stylesheets] Ends -->

	<!-- [Our Stylesheets] Starts -->
	<link href="<?= base_url('assets/css/stylesheet.css'); ?>" rel="stylesheet" media="screen" />
	<!-- [Our Stylesheets] Ends -->
</head>
<body>
<header class="shadow py-2">
		<div class="container">
			<div class="row">
				<div class="col-6 col-md-3">
					<div class="logo">
						<a href="<?= base_url(); ?>"><img src="<?= base_url(); ?>/assets/images/logo.png" title="logo" alt="logo" class="img-res"></a>
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

									<a class="btn dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-user"></i>Log in/Register
									</a>

									<div class="dropdown-menu p-2 rounded shadow-sm border-0" aria-labelledby="dropdownMenuLink">
										<a href="<?= base_url(); ?>login/signup_consumer" class="btn btn-primary btn-block txtwhite">Consumer</a>
										<a href="<?= base_url(); ?>login/signup_service_provider" class="btn btn-secondary btn-block txtwhite">Service Provider</a>
									</div>
								</div>
								<button type="button" class="btn list-buis">List Your Business</button>
							</div>
						</div>

					</nav>
				</div>
			</div>
		</div>
	</header>
    