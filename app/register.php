<?php include 'includes/header.php'; ?>
	<?php  
	// Check if register button has been clicked
	if (isset($_POST['register'])) {
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
		$pass = $_POST['pass'];
		// $hashed_pass=password_hash($pass, PASSWORD_DEFAULT);
		$sql = mysqli_query($conn, "INSERT INTO customers (fname, lname, email, phone, address, password) VALUES ('$fname','$lname','$email','$phone','$address','$pass')");

		if ($sql) {
			$_SESSION['cust_id'] = $conn->insert_id;
			$_SESSION['cust_name'] = $fname." ".$lname;
			echo "<script>alert('Bạn đã đăng ký thành công!')</script>";
		}
	}

	?>
	<div class="container" style="min-height: 450px">
		<h3 class="text-center mt-5">Đăng ký</h3>
		<div class="card mx-auto mb-5 w-75">
		  <div class="card-body p-5">
		    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
		    	<div class="form-group row">
		    		<div class="col-sm-12 col-md-6">
		    			<label for="fname">Họ </label>
		    			<input type="text" name="fname" id="fname" autocomplete="off" class="form-control" required>
		    		</div>
		    		<div class="col-sm-12 col-md-6">
			    		<label for="lname">Tên</label>
			    		<input type="text" name="lname" id="lname" autocomplete="off" class="form-control" required>
			    	</div>
		    	</div>
		    	<div class="form-group row">
		    		<div class="col-sm-12 col-md-6">
		    			<label for="email">E-mail</label>
		    			<input type="email" name="email" id="email" autocomplete="off" class="form-control" required>
		    		</div>
		    		<div class="col-sm-12 col-md-6">
			    		<label for="phone">Số điện thoại</label>
			    		<input type="text" name="phone" id="phone" autocomplete="off" class="form-control" required>
			    	</div>
		    	</div>
		    	<div class="form-group row">
		    		<div class="col-sm-12 col-md-6">
		    			<label for="address">Địa chỉ</label>
		    			<input type="text" name="address" id="address" autocomplete="off" class="form-control" required>
		    		</div>
		    		<div class="col-sm-12 col-md-6">
		    			<label for="password">Mật khẩu</label>
		    			<input type="password" name="pass" id="password" class="form-control" required>
		    		</div>
		    	</div>
		    	<div class="d-flex justify-content-between">
			    	<button type="submit" class="btn btn-info" name="register">
			    		<i class="fa fa-check-circle"></i> Đăng ký
			    	</button>
			    	<a href="login.php?red=checkout" class="text-info align-self-end">Đã có tài khoản? Đăng nhập tại đây!</a>
		    	</div>
		    </form>
		  </div>
		</div>
	</div>
<?php include 'includes/footer.php'; ?>