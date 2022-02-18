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
		<li class="breadcrumb-item active">Quản lý hóa đơn</li>
	</ol>
	<table class="table table-bordered table-sm mt-3">
		<thead>
			<tr>
				<th>#</th>
				<th>Tên hàng</th>
				<th>Số lượng</th>
				<th>Giá</th>
				<th>Tổng</th>
			</tr>
		</thead>
		<tbody>
			<?php $data = fetch_data('order_details', 'order_id', $_GET['id']); $id = $_GET['id'] ?>
			<?php if ($data): ?>
				<?php $sn = 1; ?>
				<?php foreach ($data as $row): ?>
					<tr>
						<td><?= $sn; ?></td>
						<td><?= fetch_row('products', 'id', $row['book_id'])['title']; ?></td>
						<td><?= $row['qty']; ?></td>
						<td><?= $row['price']; ?></td>
						<td><?= $row['qty'] * $row['price']; ?></td>
					</tr>
					<?php $sn += 1; ?>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
	<div class="float-right">
		<?php if(strtolower(fetch_row('orders', 'id', $_GET['id'])['status']) != 'pending'): ?>
			<p>This order has been proceesed. It was <?= strtolower(fetch_row('orders', 'id', $_GET['id'])['status']); ?></p>
		<?php else: ?>
			<a href="includes/actions.php?q=po&t=ac&id=<?=$id?>" class="btn btn-info"><i class="fa fa-check"></i> Accept</a>
			<a href="includes/actions.php?q=po&t=de&id=<?=$id?>" class="btn btn-primary"><i class="fa fa-times"></i> Decline</a>
		<?php endif ?>
	</div>
</div>
<?php include 'inc/modals.php'; ?>
<?php include 'inc/footer.php'; ?>