<?php include 'inc/header.php'; ?>
<div class="container-fluid">
	<ol class="breadcrumb mt-3">
		<li class="breadcrumb-item"><a href="#"><i class="fa fa-home"></i> Trang chủ</a></li>
		<li class="breadcrumb-item active">Đơn hàng</li>
	</ol>
	<table class="table table-bordered table-sm mt-3">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên</th>
				<th>Số điện thoại</th>
				<th>Địa chỉ giao hàng</th>
				<th class="text-center">Mã đơn hàng</th>
				<th class="text-center">Trạng thái</th>
				<th class="text-center">Ngày đặt</th>
				<th class="text-center"></th>
			</tr>
		</thead>
		<tbody>
			<?php $users = fetch_data('orders'); ?>
			<?php if ($users): ?>
				<?php $sn = 1; ?>
				<?php foreach ($users as $row): ?>
					<?php $cust = fetch_row('customers', 'id', $row['cust_id']); ?>
					<tr>
						<td><?php echo $sn; ?></td>
						<td><?php echo $cust['fname']." ".$cust['lname']; ?></td>
						<td><?php echo $row['phone_number']; ?></td>
						<td><?php echo $row['shipping_address']; ?></td>
						<td class="text-center"><?= sprintf("%05d",$row['id']) ?></td>
						<td class="text-center"><?= $row['status'] ?></td>
						<td class="text-center"><?= split_time($row['order_date']); ?></td>
						<td class="text-center">
							<a href="order_details.php?id=<?= $row['id'] ?>" class="btn btn-info btn-sm">
								<i class="fa fa-eye"></i> Chi tiết
							</a>
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