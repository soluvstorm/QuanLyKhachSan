<?php
include('include/function.php');
 ?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Lập Danh Mục Phòng - Quản lý khách sạn</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
	<meta name="keywords" content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
	<meta name="author" content="FreeHTML5.co" />


	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

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
					<li><a href="index.php">Trang chủ</a></li>
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
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Danh mục phòng</h2>
				<div class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">

					<div class="form-group">
						<form class="" action="" method="post">
						<label for="room_id">Phòng</label>
						 <input type="number" class="form-control" name = "room_id" min="100" max="999" placeholder="Nhập tên phòng gồm 3 chữ số" required>
            <div>
					</div>

          <div class="form-group">
    			     <label for="room_id">Loại Phòng</label>
					     <select class="form-control form-control-lg" name="room_type">
                 <option label="••• Chọn loại phòng"></option>
        			      <?php
                      layloaiphong();
                    ?>
      		     </select>
					</div>

					<div class="form-group">
						<label for="note">Ghi chú</label>
						<textarea class="form-control" maxlength="200" name = "note" row="5" placeholder="Ghi chú Không quá 200 ký tự"></textarea>
					</div>

          <button type="submit" name="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>Thêm phòng
          </button>

          <button type="button" name="button" class="btn btn-info">
            <a href="lapdanhmucphong.php">
              <span class="glyphicon glyphicon-refresh"></span>Tải lại
            </a>
          </button>

				</form>

        <h2>------------------------------------------------------------------------
          ---------------------------------------</h2>
          <h6>Phòng tại khách sạn</h6>
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Phòng</th>
								<th>Loại phòng</th>
								<th>Đơn giá</th>
								<th>Ghi chú</th>
							</tr>
						</thead>
						<tbody>
							<?php
							if(isset($_POST[("submit")])){
								$room_id = $_POST['room_id'];
								$room_type = $_POST['room_type'];
								$note = $_POST['note'];
								nhapphong($room_id,$room_type,$note);
							}
							xuatphong();
							?>
						</tbody>
					</table>
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
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>
