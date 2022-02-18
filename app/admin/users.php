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
		<div class="col" align="right">
			<button class="btn main-bg" data-toggle="modal" data-target="#regUser">
				<i class="fa fa-plus-square"></i> Thêm
			</button>
		</div>
	</div>
	<ol class="breadcrumb mt-3">
		<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
		<li class="breadcrumb-item active">Quản lí nhân sự</li>
	</ol>
	<table class="table table-bordered table-sm mt-3">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Email</th>
				<th>Đăng nhập lần cuối</th>
				<th class="text-center">Ngày đăng kí</th>
				<th class="text-center"></th>
			</tr>
		</thead>
		<tbody>
			<?php $users = fetch_data('auth_users'); ?>
			<?php if ($users): ?>
				<?php $sn = 1; ?>
				<?php foreach ($users as $row): ?>
					<tr>
						<td><?php echo $sn; ?></td>
						<td><?php echo $row['first_name']." ".$row['last_name']; ?></td>
						<td><?php echo $row['email']; ?></td>
						<td><?php echo last_login($row['last_login']); ?></td>
						<td class="text-center"><?php echo split_time($row['date_created']); ?></td>
						<td class="text-center">
							<a href="includes/auth.php?del=user&id=<?php echo $row['id'] ?>" onclick="return confirm_delete()" class="btn btn-danger btn-sm"><i class="fa fa-times-circle"></i> Xóa</a>
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