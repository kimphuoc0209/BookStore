<?php include 'inc/header.php'; ?>
<div class="container-fluid">
	<div class="row mt-3">
		<div class="col-md-6">
			<form action="" class="form-row">
				<div class="col">
					<input type="search" name="s" class="form-control" placeholder="Enter to search">
				</div>
				<div class="col">
					<button class="btn main-bg"><i class="fa fa-search"></i> Search</button>
				</div>
			</form>
		</div>
		<div class="col" align="right">
			<button class="btn main-bg" data-toggle="modal" data-target="#addProd">
				<i class="fa fa-plus-square"></i> Add New
			</button>
		</div>
	</div>
	<ol class="breadcrumb mt-3">
		<li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i> Trang chủ</a></li>
		<li class="breadcrumb-item active">Sản phẩm</li>
	</ol>
	<table class="table table-bordered table-sm mt-3">
		<thead>
			<tr>
				<th>ID</th>
				<th>Tên sách</th>
				<th>Giá</th>
				<th>Mô tả</th>
				<th>Ngày thêm </th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php 
				if (isset($_GET['s'])) {
					$books = mysqli_query($conn, "SELECT * FROM products WHERE title LIKE '%".$_GET['s']."%'");
				}else{
					$books = fetch_data('products'); 
				}
			?>
			<?php if ($books): ?>
				<?php foreach ($books as $book): ?>
					<tr>
						<td><?php echo $book['id']; ?></td>
						<td><?php echo $book['title']; ?></td>
						<td><?php echo $book['price']; ?></td>
						<td><?php echo $book['pdesc']; ?></td>
						<td><?php echo split_time($book['created_at']); ?></td>
						<td>
							<a href="includes/actions.php?act=del_prod&id=<?php echo $book['id'] ?>" onclick="return confirm_delete()" class="btn btn-danger btn-sm">Xóa</a>
						</td>
					</tr>
				<?php endforeach ?>
			<?php endif ?>
		</tbody>
	</table>
</div>
<?php include 'inc/modals.php'; ?>
<?php include 'inc/footer.php'; ?>