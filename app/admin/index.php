<?php  
session_start();
if (isset($_SESSION['user_id'])) {
	header("Location: products.php");
}else echo "<script>alert('Vui lòng nhập đúng thông tin!')</script>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <title>VTP Book Shop</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="../assets/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-dark">
	<div class="card mx-auto" style="max-width: 25rem; margin-top: 8rem">
	  <div class="card-header">Login</div>
	  <div class="card-body pb-5">
	    <form action="includes/auth.php" method="POST">
	      <div class="form-group">
	        <label>Username</label>
	        <input class="form-control" type="text" autocomplete="off" name="username">
	      </div>
	      <div class="form-group">
	        <label>Password</label>
	        <input class="form-control" type="password" name="password">
	      </div>
	      <button type="submit" class="btn btn-primary btn-block" name="loginBtn">Login</button>
	    </form>
	  </div>
	</div>
	<!-- Core Scripts -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/notify.min.js"></script>
	<script></script>
</body>
</html>