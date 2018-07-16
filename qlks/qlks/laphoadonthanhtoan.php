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
				<h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Lập hoá đơn thanh toán</h2>
				<div class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">
					<div class="form-group">

					  <form class="" action="" method="post">

              <div class="form-group">
                <label for="id_bill">ID hoá đơn</label>
                <input type="number" name="id_bill" class="form-control" placeholder="Nhập ID của hoá đơn" required>
              </div>

              <div class="form-group">
                <form method="post">
        			     <label>ID phiếu thuê phòng: </label>
    					     <select name="id_rent">
                     <option label="•••"></option>
            			      <?php
                          laysophieu();
                        ?>
          		     </select>
    					</div>

							 <div class="form-group">
		 						<label for="star_date">Ngày trả phòng</label>
		             <div id="datepicker" class="input-group date" data-date-format="yyyy-mm-dd"> <input class="form-control" name="out_date" readonly="" type="text"> <span class="input-group-addon"></span>
		             </div>
		           </div>

					     <div class="form-group">
					      <label for="">Loại Khách</label>
					       <div class="form-group">
					         <h3><input type="radio" name="type" value="1" required>Nội Địa</h3>
					       </div>
					       <div class="form-group">
					         <h3><input type="radio" name="type" value="1.5" required>Nước Ngoài</h3>
					       </div>
					     </div>

					     <div class="form-group">
					      <label for="">Có khách thứ 3</label>
					       <div class="form-group">
					         <h3><input type="radio" name="number" value="1.25" required>Có</h3>
					       </div>
					       <div class="form-group">
					         <h3><input type="radio" name="number" value="1" required>Không</h3>
					       </div>
					     </div>

					  <button type="submit" name="submit" class="btn btn-success btn-lg">Lập hoá đơn</button>


            <?php
            if(isset($_POST[("submit")])) {

              $id_bill = $_POST['id_bill'];
              $id_rent = $_POST['id_rent'];
              $out_date = $_POST['out_date'];
              $type = $_POST['type'];
              $number = $_POST['number'];

              laybill($id_bill, $id_rent, $out_date, $type, $number);
            }
           ?>
          </form>

          <h2>------------------------------------------------------------------------
            ---------------------------------------</h2>
            <h6>Tra cứu thông tin khách</h6>

            <div class="form-group">
              <form class="" action="laphoadonthanhtoan.php?go2" method="post">
      			     <label>ID phiếu: </label>
  					     <select name="id_rent">
                   <option label="•••"></option>
          			      <?php
                        laysophieu();
                      ?>
        		     </select>
                 <button type="submit" name="submit3" class="btn btn-default btn-lg">Tìm</button>
              </form>
              <?php
                timphieu2();
               ?>
  					</div>

          <h6>Các hoá đơn đã lập</h6>

          <div class="form-group">
            <form class="" action="laphoadonthanhtoan.php?go" method="post">
    			     <label>ID hoá đơn: </label>
					     <select name="id_bill">
                 <option label="•••"></option>
        			      <?php
                      laysohoadon();
                    ?>
      		     </select>
            <button type="submit" name="submit2" class="btn btn-default btn-lg">Tìm</button>
            </form>
            <?php
              timbill();
             ?>
					</div>

				</div>
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
        startDate: '+1d',
        autoclose: true,
        todayHighlight: true
      }).datepicker('update', new Date());
    });
  </script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script>

</body>

</html>
