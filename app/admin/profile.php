<?php include 'inc/header.php'; ?>
<div class="container-fluid">
	<h1 class="text-center mt-5">TRANG CÁ NHÂN</h1>
	<div class="card mx-auto mb-5 w-50">
	  <div class="card-body py-4">
	  	<!-- Fetch Data -->
	  	<?php $user = fetch_row('auth_users', 'id', $_SESSION['user_id']); ?>
	    <div class="row">
	    	<div class="col-md-4">
	    		<img src="<?= $user['img'] ?>" alt="" style="width: 100%" class="rounded">
	    	</div>
	    	<div class="col">
	    		<table class="table table-striped mb-0">
	    			<tr>
	    				<td>TÊN:</td>
	    				<td><?= $user['first_name'].' '.$user['last_name']; ?></td>
	    			</tr>
	    			<tr>
	    				<td>TÊN NGƯỜI DÙNG:</td>
	    				<td><?= $user['username'] ?></td>
	    			</tr>
	    			<tr>
	    				<td>E-MAIL:</td>
	    				<td><?= $user['email'] ?></td>
	    			</tr>
	    			<tr>
	    				<td>VAI TRÒ:</td>
	    				<td><?= $user['status'] ?></td>
	    			</tr>
	    		</table>
	    	</div>
	    </div>
		<hr>
	    <!-- Controller -->
	    <div align="right" class="mt-3">
	    	<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
	    		<input type="file" name="dp">
	    		<button class="btn btn-info" name="upload"><i class="fa fa-user"></i> Cập nhật trang cá nhân</button>
	    	</form>
	    </div>
	  </div>
	</div>
</div>
<?php include 'inc/footer.php'; ?>

<!-- UPLOAD IMAGE -->
<?php  
	if (isset($_POST['upload'])) {
		$dp = $_FILES['dp'];
		$ext = explode('.', $dp['name']);
		$ext = strtolower($ext[1]);

		$name = uniqid().'.'.$ext;
		$path = '../uploads/'.$name;

		if (move_uploaded_file($dp['tmp_name'], $path)) {
			$sql = mysqli_query($conn, "UPDATE auth_users SET img = '$path' WHERE id = '".$_SESSION['user_id']."'");
			?>
				<script>alert('Image uploaded');</script>
			<?php
		}
	}
?>