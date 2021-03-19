<?php
    include 'libs/session.php';
    Session::init();
?>
<?php
	
	include 'libs/database.php';
	include 'format/format.php';

	spl_autoload_register(function($class){
		include_once "class/".$class.".php";
	});
		

	$db = new Database();
	$fm = new Format();
	$product = new product();
	$cat = new category();
	$pm = new payment();
	$cus = new customer();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Cổng mua hàng trực tuyến</title>
	<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css">
	<script type="text/javascript" src="assets/bootstrap/js/bootstrap.js"></script>
	<script src="assets/js/jquery-3.5.1.min.js" type="text/javascript" ></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	<script src="/assets/js/main.js" type="text/javascript" ></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="assets/css/normalize.css">
	<link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css' rel='stylesheet'>
	<link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600;700&display=swap" rel="stylesheet"/>
	  <link href='admincontroller/img/favicon.ico' rel='icon' type='image/x-icon'/>

</head>
<body >
<header id="box-header">
	<div class="menu-header">
		<div class="container">
			<div class="row">
				<div class="col-left">
					<div class="chooseaddress">
						<a href="" title=""><i class="fas fa-search-location"></i> Địa chỉ giao hàng của bạn ?</a>
					</div>
				</div>
				<div class="col-right">
					<div class="hootline">
						<a href="" title=""><i class="fas fa-phone-alt"></i> Hootline: 0974739xx</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="main-menu">
		<div class="container">
			<div class="row">
				<div class="col-left brand">
					<a href="index.php" title="Logo Brand"	>
						<img src="assets/images/logo.png" alt="Logo Brand">
					</a>
				</div>
				<div class="col-center">
					<div id="nav-search">
					<form action="search.php" class="search-form" role="search" method="GET">
						<input autocomplete="off" class="search-input" name="s" placeholder="Ex. Nhập cái gì vào và ấn enter xem thử.." value="">
						<button class="search-action" type="submit" value=""></button>
					</form>
				</div>
				</div>
				<div class="col-right">
					<div class="list-nav-link">
						<ul>
							<li class="nav-left"><a href="#" title=""><i class="fas fa-truck"></i> Miễn Phí Vận Chuyển</a></li>
						</ul>
						<?php 
							if(isset($_GET['customer_Id'])){
								$customer_id = $_GET['customer_Id'];
								Session::destroy($customer_id );
							}
						?>  
						<div class="box-profile">
							<?php 
								$login_check = Session::get('customer_login');
								if ($login_check==false) {
									echo '<a href="login.php"><i class="far fa-user"></i> Đăng nhập</a>'; 
								}else {
									echo '<div class="dropdown-user">
										<span><i class="far fa-user"></i> '.Session::get('customer_name').'</span>
										<div class="dropdown-content">
										  	<li><a href="account.php">Thông tin tài khoản</a></li>
										  	<li><a href="order-detail.php">Lịch sử mua hàng</a></li>

										  	<li><a href="?customer_Id='.Session::get('customer_id').' ">Đăng xuất</a></li>
										 </div>
										</div>'; 
								}
								?>
						</div>
						<div class="box-cart">
							<?php 
							$check_payment = $pm -> check_payment();
							if ($check_payment){
								while ($result = $check_payment -> fetch_assoc() ){
							?>	
							<a href="payment.php" title="Xem thông tin giỏ hàng">Giỏ hàng <img src="assets/images/shopping-cart.png" alt=""> 
								<span class="check_payment">
									<?php echo $result['checkpayment']; ?>
								</span>
							</a>
						<?php }}?>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
</header><!-- /header -->
