<?php
include('include/function.php');
 ?>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Trang chủ - Quản lý khách sạn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


  	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content=""/>
	<meta property="og:image" content=""/>
	<meta property="og:url" content=""/>
	<meta property="og:site_name" content=""/>
	<meta property="og:description" content=""/>
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	</head>
	<body>
	<div id="fh5co-page">
		<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
		<aside id="fh5co-aside" role="complementary" class="border js-fullheight">
			<h1 id="fh5co-logo"><a href="index.php"><img src="images/hotel.png" alt="#"></a></h1>
			<nav id="fh5co-main-menu" role="navigation">
				<ul>
					<!-- <li><a href="index.php">Trang chủ</a></li> -->
					<li class="fh5co-active"><a href="index.php">Trang chủ</a></li>
					<?php
          session_start();
          if (isset($_SESSION['user'])) {
            if ($_SESSION['role'] == 1) {
              echo "<li>Chào mừng " . $_SESSION['user'] . " !</li>";
              echo "<li><a href ='logout.php'>Đăng xuất</a></li>";
            }
            else {
              echo "<li>Chào mừng " . $_SESSION['user'] . "!</li>";
              echo "<li><a href ='logout.php'>Đăng xuất</a></li>";
            }
          }else {
            header("location:indexmain.php");
          }
           ?>
				</ul>
			</nav>

			<div class="fh5co-footer">
				<p><small>&copy; Group 6 - Quản lý khách sạn.</span> <span></span></small></p>
				<ul>
					<li><a href="#"><i class="icon-facebook"></i></a></li>
					<li><a href="#"><i class="icon-twitter"></i></a></li>
					<li><a href="#"><i class="icon-instagram"></i></a></li>
					<li><a href="#"><i class="icon-linkedin"></i></a></li>
				</ul>
			</div>

		</aside>

		<div id="fh5co-main">

			<div class="fh5co-narrow-content">
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Trang chủ </h2>
				<div class="row animate-box" data-animate-effect="fadeInLeft">
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="lapdanhmucphong.php">
							<img src="images/add.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Lập Danh Mục Phòng</h3>
						</a>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="lapphieuthuephong.php">
							<img src="images/invoice.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Lập Phiếu Thuê Phòng</h3>
						</a>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="tracuuphong.php">
							<img src="images/magnifying-glass.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Tra cứu phòng</h3>
						</a>
					</div>
					<div class="clearfix visible-md-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="laphoadonthanhtoan.php">
							<img src="images/invoice-cre.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Lập Hoá Đơn Thanh Toán</h3>
						</a>
					</div>
					<div class="clearfix visible-sm-block"></div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">
						<a href="lapbaocaothang.php">
							<img src="images/newspaper.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Lập báo cáo tháng</h3>
						</a>
					</div>
					<div class="col-md-4 col-sm-6 col-xs-6 col-xxs-12 work-item">

            <?php
            if ($_SESSION['role'] == 1) {
            echo "<a href='thaydoiquydinh.php'>";
            }
            else {
            }
             ?>

							<img src="images/settings.png" alt="#" class="img-responsive">
							<h3 class="fh5co-work-title">Thay đổi quy định</h3>
						</a>
					</div>
					<div class="clearfix visible-md-block visible-sm-block"></div>

					<div class="clearfix visible-md-block"></div>

				</div>
			</div>

		</div>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Stellar -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Counters -->
	<script src="js/jquery.countTo.js"></script>


	<!-- MAIN JS -->
	<script src="js/main.js"></script>

	</body>
</html>
