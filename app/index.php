
<?php include 'includes/header.php'; ?>
<div class="container">
	<!-- Page Banner -->
	<div class="jumbotron mt-4 mb-sm-4" style="margin-bottom: 0">
	  <h1 class="display-4">Cửa hàng sách VTP!</h1>
	  <p class="lead">Một cuốn sách thực sự hay nên đọc trong tuổi trẻ, rồi đọc lại khi đã trưởng thành, và một nửa lúc tuổi già, giống như một tòa nhà đẹp nên được chiêm ngưỡng trong ánh bình minh, nắng trưa và ánh trăng.</p>
	</div>

	<!-- Book Cards -->
	<?php  
		if (isset($_GET['item'])) {
			$sql = mysqli_query($conn, "SELECT * FROM products WHERE title LIKE '%".$_GET['item']."%'");
		}else{
			$sql = mysqli_query($conn, "SELECT * FROM products");
		}

		$books = mysqli_fetch_all($sql, MYSQLI_BOTH);
	?>
	<?php
	if(isset($_GET['trang'])){
		$page=$_GET['trang'];
	}else{
		$page=1;
	}
	if($page==''||$page==1){
		$begin=0;
	}else{
		$begin=($page*6)-6;
	}
	$sql="SELECT * FROM products ORDER BY id DESC LIMIT $begin,6 ";
	$querry_pro = mysqli_query($conn,$sql);
?>
	<div class="book-card row">
	
		
		<?php if ($books): ?>
			
			<?php
		while ($row=mysqli_fetch_array($querry_pro)){
			?>
				<div class="col-md-4 mb-sm-4 mt-c-sm-3">
					<div class="card">
					  <img class="card-img-top" src="<?php echo $row['img'] ?>" alt="Card image cap">
					  <div class="card-body">
					    <h4 class="card-title"><?php echo $row['title'] ?></h4>
						<h4 class="card-title"><?php echo number_format($row['price'],2) ?><?php echo " VND"?></h4>
					    <p class="card-text"><?php echo $row['pdesc'] ?></p>
					    <form action="includes/cart.inc.php" method="POST">
					    	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					    	<input type="hidden" name="name" value="<?php echo $row['title'] ?>">
					    	<input type="hidden" name="price" value="<?php echo $row['price'] ?>">
					    	<input type="hidden" name="qty" value="1">
					    	<button type="submit" name="addtoCart" class="btn btn-primary">
					    		<i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng
					    	</button>
					    </form>
					  </div>
					</div>
				</div>
				<?php
		}
		?>
			
			<?php else: ?>
				<div class="p-5">
					<p class="text-center">Không có sản phẩm nào!</p>
				</div>
		<?php endif ?>
		
		
		<div style="clear:both;"></div>
	<style type="text/css">
		ul.list_trang {
			padding: 0;
			margin: 0;
			list-style: none;
		}
		ul.list_trang li {
			float: left;
			padding: 5px 13px;
			margin: 5px;
			background: burlywood;
		}
		ul.list_trang li a {
			color: black;
			text-align: center;
			text-decoration: none;
			display: block;
		}
	</style>
	<?php
	$sql_trang =mysqli_query($conn,"SELECT * FROM products");
	$row_count=mysqli_num_rows($sql_trang);
	$trang= ceil($row_count/6);
	?>
	<p>Trang hiện tại : <?php echo $page?>/<?php echo $trang?></p>
	
	<ul class="list_trang">
		<?php
		
		for($i=1;$i<=$trang;$i++){
		?>	
			<li <?php if($i==$page){echo 'style="background:brown"';}else {echo '';}?>><a  href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
			<?php
		}
		?>
	</ul>
	</div>
	
</div>


<?php include 'includes/footer.php'; ?>