<?php include 'includes/header.php'; ?>
	<div class="container" style="min-height: 450px">
		<h3 class="text-center mt-5">Giỏ hàng</h3>
		<div class="card mx-auto mb-5 w-75">
		  <div class="card-body py-4">
		    <table class="table table-bordered">
		    	<thead>
		    		<tr>
		    			<th>Tên sách</th>
		    			<th class="text-center">Số lượng</th>
		    			<th>Thành tiền</th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<?php $data = get_cart(); ?>
		    		<?php if ($data): ?>
		    			<?php foreach ($data as $row): ?>
		    				<?php $id = $row['id'] ?>
		    				<tr>
		    					<td class="align-middle">
		    						<?= cart_prod($row['book_id'])['title']; ?>
		    					</td>
		    					<td>
                                <div class="mx-auto" style="width: 100px">            
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text" onclick="decrease(<?= $id ?>, <?= cart_prod($row['book_id'])['price'] ?>)">-</button>
                                        </div>
                                        <input type="text" class="form-control bg-white" id="qty_<?= $id ?>" readonly value="<?php echo $row['qty'] ?>">
                                        <div class="input-group-append">
                                            <button class="input-group-text" onclick="increase(<?= $id ?>, <?= cart_prod($row['book_id'])['price'] ?>)">+</button>
                                        </div>
                                    </div>
                                </div>
                            </td>
		    					<td class="align-middle text-center" id="total_<?= $id ?>">
		    						<?= $row['qty'] * cart_prod($row['book_id'])['price'] ?>
		    					</td>
		    				</tr>
		    			<?php endforeach ?>
		    		<?php endif ?>
		    	</tbody>
		    </table>
		    <a href="checkout.php" class="btn btn-primary float-right <?= (get_cart(1) == 0 ) ? 'disabled' : ''?>">Thanh toán</a>
		  </div>
		</div>
	</div>
<?php include 'includes/footer.php'; ?>