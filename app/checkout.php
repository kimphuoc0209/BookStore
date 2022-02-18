<?php 

include 'includes/header.php';

if (! isset($_SESSION['cust_id'])) {
	header("Location: login.php?red=checkout");
	exit();
}

?>
<div class="container" style="min-height: 550px">
	<div class="row">
		<div class="col">
			<h3 class="text-center mt-5">Chi tiết vận chuyển</h3>
			<div class="card mx-auto mb-5">
			  <div class="card-body py-4">
			    <form action="includes/cart.inc.php" method="post">
			    	<div class="form-group">
			    		<label for="c-name">Tên khách hàng</label>
			    		<input type="text" id="c-name" name="c-name" class="form-control" value="<?= $_SESSION['cust_name'] ?>" readonly>
			    		<input type="hidden" name="cust_id" class="form-control" value="<?= $_SESSION['cust_id'] ?>">
			    	</div>
			    	<div class="form-group">
			    		<label for="c-phone">Số điện thoại</label>
			    		<input type="text" id="c-phone" name="c-phone" class="form-control">
			    	</div>
			    	<div class="form-group">
			    		<label for="c-address">Địa chỉ nhận hàng</label>
			    		<input type="text" id="c-address" name="c-address" class="form-control">
			    	</div>
			    	<button type="submit" name="submit_order" class="btn btn-primary">Xác nhận</button>
			    </form>
			  </div>
			</div>
		</div>

		<div class="col">
			<h3 class="text-center mt-5">Chi tiết đơn hàng</h3>
			<div class="card mx-auto mb-5">
			  <div class="card-body py-4">
			  	<p>Bạn có <?= get_cart(true) ?> sản phẩm trong giỏ hàng</p>
			    <table class="table table-stripped">
			    	<thead>
			    		<tr>
			    			<th>Tên sách</th>
			    			<th class="text-center">Số lượng</th>
			    			<th class="text-right">Thành tiền</th>
			    		</tr>
			    	</thead>
			    	<tbody>
			    		<?php $data = get_cart(); $total = 0; ?>
			    		<?php if ($data): ?>
			    			<?php foreach ($data as $row): ?>
			    				<tr>
			    					<td><?= cart_prod($row['book_id'])['title']; ?></td>
			    					<td class="text-center"><?= $row['qty'] ?></td>
			    					<td class="text-right"><?= number_format($row['qty'] * $row['price'], 2) ?><?php echo " VND"?></td>
			    				</tr>
			    				<?php $total += $row['qty'] * $row['price']; ?>
			    			<?php endforeach ?>
			    			<tr>
			    				<th colspan="2">Tổng tiền</th>
			    				<th class="text-right"><?= number_format($total, 2) ?><?php echo " VND"?></th>
			    			</tr>
			    		<?php endif ?>
			    	</tbody>
			    </table>
			  </div>
			</div>
		</div>
	</div>
</div>
<?php include 'includes/footer.php'; ?>