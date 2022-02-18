<?php include 'includes/header.php'; ?>
<div class="container mb-sm-5">
	<h1 class="text-center mt-5">Liên hệ</h1>
	<hr>
	<div class="row">
		<div class="col-md-6">
			<form action="includes/actions.php" class="mb-4"  method="POST">
				<div class="form-group">
					<label for="">Họ và tên</label>
					<input type="text" name="fname" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Địa chỉ Email</label>
					<input type="Email" name="email" class="form-control" required>
				</div>
				<div class="form-group">
					<label for="">Số điện thoại</label>
					<input type="text" name="phone" class="form-control">
				</div>
				<div class="form-group">
					<label for="">Tin nhắn</label>
					<textarea name="msg" required class="form-control"></textarea>
				</div>
				<button class="btn btn-primary btn-block" name="send-msg">Gửi</button>
			</form>
		</div>
		<div class="col-md-6 pl-sm-5">
			<h2 class="mt-sm-4">Cửa hàng sách VTP</h2>
			<p>Một cuốn sách là một giấc mơ mà bạn cầm trong tay</p>
			<hr>
			<h4>Thông tin liên hệ</h4>
			<p><i class="fa fa-phone"></i> Phone: +84 33 571 0477</p>
			<p><i class="fa fa-envelope"></i> Email: 1951120157@sv.ut.edu.vn</p>
			<p><i class="fa fa-envelope"></i> Email: 1951120161@sv.ut.edu.vn</p>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>