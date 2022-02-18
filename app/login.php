<?php include 'includes/header.php'; ?>
	<?php  
	// Check if register button has been clicked
	if (isset($_POST['login'])) {
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$sql = mysqli_query($conn, "SELECT * FROM customers WHERE email = '$email' AND password = '$pass'");

		if (mysqli_num_rows($sql) > 0) {
			$data = mysqli_fetch_assoc($sql);
			$_SESSION['cust_id'] = $data['id'];
			$_SESSION['cust_name'] = $data['fname']." ".$data['lname'];
			header("Location: index.php");
		}else{
			header("Location: ?login_error");
			
		}
	}else echo "<script>alert('Vui lòng nhập đúng thông tin!')</script>";
	?>
	<div class="container" style="min-height: 450px">
		<h3 class="text-center mt-5">Đăng nhập</h3>
		<div class="card mx-auto mb-5 w-50">
		  <div class="card-body p-5">
		    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		    	<div class="form-group">
		    		<label for="email">E-mail</label>
		    		<input type="email" name="email" id="email" autocomplete="off" class="form-control">
		    	</div>
		    	<div class="form-group">
		    		<label for="password">Mật khẩu</label>
		    		<input type="password" name="pass" id="password" class="form-control">
		    	</div>
		    	<div class="d-flex justify-content-between">
			    	<button type="submit" class="btn btn-info" name="login">
			    		<i class="fa fa-check-circle"></i> Đăng nhập
			    	</button>
			    	<a href="register.php?red=checkout" class="text-info align-self-end">Chưa có tài khoản? Hãy đăng ký tại đây</a>
		    	</div>
		    </form>
		  </div>
		</div>
	</div>
<?php include 'includes/footer.php'; ?>