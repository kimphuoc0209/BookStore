<?php include 'inc/header.php'; ?>
<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" class="form-row">
				<div class="col">
					<input type="text" name="s" class="form-control" placeholder="Enter to search">
				</div>
				<div class="col">
					<button class="btn main-bg"><i class="fa fa-search"></i> Tìm kiếm</button>
				</div>
			</form>
		</div>
	</div>
	<ol class="breadcrumb mt-3">
		<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
		<li class="breadcrumb-item active">Quản lý đơn</li>
	</ol>
	<table class="table table-bordered table-sm mt-3">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Email</th>
				<th>SDT</th>
				<th>Địa chỉ</th>
				<th class="text-center">Ngày đăng kí</th>
				<th class="text-center"></th>
			</tr>
		</thead>
		<tbody>
			<?php
				if (isset($_GET['s'])) {
				 	$users = mysqli_query($conn, "SELECT * FROM customers WHERE fname LIKE '%".$_GET['s']."%'");
				 } else {
					$users = fetch_data('customers'); 
				}

			?>
			<?php if ($users): ?>
				<?php $sn = 1; ?>
				<?php foreach ($users as $row): ?>
					<tr>
						<td><?= $sn; ?></td>
						<td><?= $row['fname']." ".$row['lname'];; ?></td>
						<td><?= $row['email']; ?></td>
						<td><?= $row['phone']; ?></td>
						<td><?= $row['address']; ?></td>
						<td class="text-center"><?php echo split_time($row['reg_date']); ?></td>
						<td class="text-center">
							<a href="includes/actions.php?act=del_cust&id=<?php echo $row['id'] ?>" onclick="return confirm_delete()" class="btn btn-primary btn-sm">Xóa</a>
						</td>
					</tr>
					<?php $sn += 1; ?>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<?php include 'inc/modals.php'; ?>
<?php include 'inc/footer.php'; ?>