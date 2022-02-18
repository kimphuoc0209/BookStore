<?php session_start(); include 'includes/dbh.php'; include 'includes/functions.php'; ?>
<?php include 'includes/cart.inc.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>VTP Book Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/css/sweetalert.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    	<div class="container">
		  	<button class="navbar-toggler collapsed m-2" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  	</button>

		  	<div class="navbar-collapse collapse" id="navbarColor01">
			    <ul class="navbar-nav mr-auto">
			      <li class="nav-item active">
			        <a class="nav-link" href="index.php"><i class="fa fa-book"></i> Trang chủ</a>
			      </li>
			      <li class="nav-item">
			        <a class="nav-link" href="contact.php"><i class="fa fa-phone"></i> Liên hệ</a>
			      </li>
			    </ul>
			    <ul class="nav navbar-nav ml-auto">
				<?php if (isset($_SESSION['cust_id'])): ?>
	            	<li class="nav-item dropdown">
		              <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#">
		              	<?= $_SESSION['cust_name']; ?> <span class="caret"></span>
		              </a>
		              <div class="dropdown-menu" aria-labelledby="themes">
		                <a class="dropdown-item" href="orders.php">
		                   <i class="fa fa-share-alt-square"></i> Đơn hàng của tôi
		                </a>
		                <div class="dropdown-divider"></div>
		                <a class="dropdown-item" href="logout.php">
			               <i class="fa fa-lock"></i> Đăng xuất
			            </a>
		              </div>
		            </li>
		        <?php else: ?>
	        		<li class="nav-item">
	        			<a class="nav-link" href="login.php">Đăng nhập</a>
	        		</li>
	        		<li class="nav-item">
	        			<a class="nav-link" href="register.php">Đăng ký</a>
	        		</li>
	          	<?php endif ?>
	          	<li class="nav-item">
	        			<a class="nav-link" href="admin/">Admin</a>
	        		</li>
	          	</ul>
			</div>

			<span class="navbar-text">
				<span class="shopping-cart-button" style="cursor: pointer;" onclick="cart()">
					<i class="fa fa-shopping-cart"></i>
					<span class="badge badge-warning rounded"> 
						<?= get_cart(true); ?>
					</span>
				</span>
			</span>
		</div>
	</nav>
	<div class="container mt-3 clearfix">
		<form action="" class="form-inline float-right">
			<input type="search" name="item" class="form-control mr-2">
			<button class="btn btn-primary">Tìm kiếm</button>
		</form>
	</div>