<?php
require_once ('inc/pre-scripts.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta name="google-site-verification" content="B-rELLAyRf5kaXynTQldI32HBFNxVttzgksoT6AqWA8" />
		<meta charset="utf-8">
		<title>Clipmob</title>
		<link rel="shortcut icon" type="image/png" href = "img/clipmobfavicon.png">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="Find the best deals for you!">
		<meta name="author" content="JJTN">
		<!-- Le styles -->
		<link href="stylesheets/bootstrap.css" rel="stylesheet">
		<link href="stylesheets/bootstrap-responsive.css" rel="stylesheet">
		<link rel="stylesheet/less" type="text/css" href="m.less">

		<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<?php
		include_once ('inc/navbar.inc.php');
		?>
		<div class="container">
			<div id="body">
				<!-- Main hero unit for a primary marketing message or call to action -->
				<div class="hero-unit">
					<div class="hero-unit clearfix">
						<div class="row">
							<div class="span3 bs-docs-sidebar">
								<ul class="nav nav-list bs-docs-sidenav">
									<li>
										<a href="#About"><i class="icon-chevron-right"></i> About Clipmob</a>
									</li>
									<li>
										<a href="#Team"><i class="icon-chevron-right"></i> Who we are</a>
									</li>
								</ul>
							</div>
							<div class="span9">
								<div id="body">
									<section id="About">
										<h3 id="headings">About Clipmob</h3>
										<p>
											So you're at your home, browsing through deals for some shopping later in the day. Or maybe you own a small
											restaurant and are trying to have a promotional event to gain customers. 
											<br>Don't worry, Clipmob has got you covered! 
											
											Clipmob is the place to be if you never want to miss a deal. Retailers and users in the community upload 
											coupon images using filepicker.io. Members can browse through the selection of coupons and if there's a coupon
											 that they would want to use, they can save it onto their dropbox. When they go to the store, they can use their
											 mobile device to show the coupon image and redeem the offer. Our users can rate coupons up or down, meaning
											 that good deals will never get lost. 
										</p>
									</section>
										<section id="About">
											<h3 id="headings">Who We Are</h3>
											<p>
												Clip mob is composed of four Penn students - Josh, Jason, Tommy, and Neil.
											</p>
										</section>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
		include_once ('inc/footer.inc.php');
		?>
		<!-- /container -->
		<!-- Le javascript
		================================================== -->
		<!-- Placed at the end of the document so the pages load faster -->
		<script src="http://code.jquery.com/jquery.min.js"></script>
		<script src="js/bootstrap.js"></script>
	</body>
</html>