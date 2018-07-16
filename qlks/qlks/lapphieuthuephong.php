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
	<title>Lập Phiếu Thuê Phòng - Quản lý khách sạn</title>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet prefetch" href="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css">
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
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Lập phiếu thuê phòng </h2>
				<div class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">
          <form class="" action="" method="post">

					<div class="form-group">
						<label for="id_rent">ID Phiếu</label>
						<input type="number" name="id_rent" class="form-control" placeholder="Nhập ID của phiếu thuê phòng" required>
					</div>

					<div class="form-group">
    			     <label for="room_id">Phòng</label>
					     <select class="form-control form-control-lg" name="room_id">
                 <option label="••• Chọn phòng"></option>
        			      <?php
                      laysophong();
                    ?>
      		     </select>
					</div>

					<div class="form-group">
						<label for="star_date">Ngày bắt đầu thuê</label>
            <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input class="form-control" name="star_date" readonly="" type="text"> <span class="input-group-addon"></span>
            </div>
          </div>

					<div class="form-group">
						<label for="cus_name">Khách hàng 1</label>
						<input type="text" name="cus_name" class="form-control" placeholder="Nhập tên của khách hàng" required>
					</div>

          <div class="form-group">
    			     <label for="cus_type">Loại Khách</label>
					     <select class="form-control form-control-lg" name="cus_type">
                 <option label="••• Chọn loại khách"></option>
        			   <option label="• Nội địa">Nội địa</option>
                 <option label="• Nước ngoài">Nước ngoài</option>
      		     </select>
					</div>

					<div class="form-group">
						<label for="cus_id">CMND/Passport</label>
						<input type="text" name="cus_id" class="form-control" placeholder="Nhập CMND của khách - Không quá 12 ký tự, nếu là khách nước ngoài có thể nhập visa/passport" required>
					</div>

					<div class="form-group">
						<label for="cus_add">Địa chỉ</label>
						<input type="text" name="cus_add" class="form-control" placeholder="Nhập địa chỉ của khách" required>
					</div>

          <div class="form-group">
						<label for="cus_name_2">Khách hàng 2</label>
						<input type="text" name="cus_name_2" class="form-control"  placeholder="Nhập tên của khách hàng">
					</div>

          <div class="form-group">
    			     <label for="cus_type_2">Loại Khách</label>
					     <select class="form-control form-control-lg" name="cus_type_2">
                 <option label="••• Chọn loại khách"></option>
        			   <option label="• Nội địa">Nội địa</option>
                 <option label="• Nước ngoài">Nước ngoài</option>
      		     </select>
					</div>

					<div class="form-group">
						<label for="cus_id_2">CMND/Passport</label>
						<input type="text" name="cus_id_2" class="form-control" placeholder="Nhập CMND của khách - Không quá 12 ký tự, nếu là khách nước ngoài có thể nhập visa/passport">
					</div>

					<div class="form-group">
						<label for="cus_add_2">Địa chỉ</label>
						<input type="text" name="cus_add_2" class="form-control" placeholder="Nhập địa chỉ của khách">
					</div>

          <div class="form-group">
						<label for="cus_name_3">Khách hàng 3</label>
						<input type="text" name="cus_name_3" class="form-control" placeholder="Nhập tên của khách hàng">
					</div>

          <div class="form-group">
    			     <label for="cus_type_3">Loại Khách</label>
					     <select class="form-control form-control-lg" name="cus_type_3">
                 <option label="••• Chọn loại khách"></option>
        			   <option label="• Nội địa">Nội địa</option>
                 <option label="• Nước ngoài">Nước ngoài</option>
      		     </select>
					</div>

					<div class="form-group">
						<label for="cus_id_3">CMND/Passport</label>
						<input type="text" name="cus_id_3" class="form-control" placeholder="Nhập CMND của khách - Không quá 12 ký tự, nếu là khách nước ngoài có thể nhập visa/passport">
					</div>

					<div class="form-group">
						<label for="cus_add_3">Địa chỉ</label>
						<input type="text" name="cus_add_3" class="form-control" placeholder="Nhập địa chỉ của khách">
					</div>

          <button type="submit" name="submit" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span>Thêm phiếu
          </button>

          <button type="button" name="button" class="btn btn-info">
            <a href="lapphieuthuephong.php">
              <span class="glyphicon glyphicon-refresh"></span>Tải lại
            </a>
          </button>

          <?php
            if(isset($_POST[("submit")])) {
              $id_rent = $_POST['id_rent'];
              $room_id = $_POST['room_id'];
              $star_date = $_POST['star_date'];
              $cus_name = $_POST['cus_name'];
              $cus_type = $_POST['cus_type'];
              $cus_id = $_POST['cus_id'];
              $cus_add = $_POST['cus_add'];

              $cus_name_2 = $_POST['cus_name_2'];
              $cus_type_2 = $_POST['cus_type_2'];
              $cus_id_2 = $_POST['cus_id_2'];
              $cus_add_2 = $_POST['cus_add_2'];

              $cus_name_3 = $_POST['cus_name_3'];
              $cus_type_3 = $_POST['cus_type_3'];
              $cus_id_3 = $_POST['cus_id_3'];
              $cus_add_3 = $_POST['cus_add_3'];
            layphieu($id_rent,$room_id,$star_date,$cus_name,$cus_type,$cus_id,$cus_add, $cus_name_2,$cus_type_2,$cus_id_2,$cus_add_2, $cus_name_3,$cus_type_3,$cus_id_3,$cus_add_3);
            }
           ?>
        </form>

          <h2>------------------------------------------------------------------------
            ---------------------------------------</h2>

          <h6>Các phiếu đã lập</h6>

          <div class="form-group">
            <form class="" action="lapphieuthuephong.php?go" method="post">
    			     <label>ID phiếu: </label>
					     <select name="id_rent">
                 <option label="•••"></option>
        			      <?php
                      laysophieu();
                    ?>
      		     </select>
            <button type="submit" name="submit2" class="btn btn-default btn-lg">Tìm</button>
					</div>

          <?php
            timphieu();
           ?>

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

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script src="js/jquery-1.11.1.min.js"></script>
  <script type="text/javascript">
    $(function() {
      $("#datepicker").datepicker({
        startDate: '+0d',
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());
    });
  </script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</body>

</html>
