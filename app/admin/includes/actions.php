<?php 
// Include Connection and Functions files
include 'dbh.php';
include 'functions.php';

// Thêm sản phẩm
if (isset($_POST['save-prod'])) {
	$title = $_POST['b-title'];
	$price = $_POST['b-price'];
	$image = $_FILES['b-image'];
	$descr = $_POST['b-descr'];

	// Thêm hình ảnh bìa
	$path = "../../uploads/".uniqid().".jpg";
	$temp = $image['tmp_name'];

	$img = @file_get_contents($temp);
	$img = @imagecreatefromstring($img);
	if ($img !== false) {
	  imagejpeg($img, $path);
	  imagedestroy($img);
	  
	  // Chỉnh lại đường dẫn đến bìa
	  $path = substr($path, 6);

	  // sau đó thêm vào CSDL
	  $sql = mysqli_query($conn, "INSERT INTO products (title, price, pdesc, img, created_by) VALUES ('$title', '$price', '$descr', '$path', 'Admin')");
	  if ($sql) {
	  	header("Location: ../products.php?r=inserted");
		exit();
	  }
	}
}

// Xóa sản phẩm
if (isset($_GET['act']) && $_GET['act'] == 'del_prod') {
	$p_info = fetch_data('products', 'id', $_GET['id'])[0];

	// Xóa hình ảnh
	if (unlink("../../".$p_info['img'])) {
		// Sau đó xóa thông tin sản phẩm
		if (delete_data('products', 'id', $_GET['id'])) {
			header("Location: ../products.php?r=deleted");
			exit();
		}	
	}
}

// Xóa người dùng
if (isset($_GET['act']) && $_GET['act'] == 'del_cust') {

	if (delete_data('customers', 'id', $_GET['id'])) {
		header("Location: ../customers.php?r=deleted");
		exit();
	}	
}

// Đơn hàng
if (isset($_GET['q']) && $_GET['q'] == 'po') {
	$type = $_GET['t'];
	$id = $_GET['id'];

	if ($type == 'ac') {
		$order = fetch_data('order_details', 'order_id', $id);
		foreach ($order as $data) {
			$sale = mysqli_query($conn, "INSERT INTO sales VALUES ('','".$data['order_id']."','".$data['book_id']."','".$data['qty']."','".$data['price']."', DEFAULT)");
		}
		
		$sql = mysqli_query($conn, "UPDATE orders SET status = 'accepted' WHERE id = '$id'");
	}else{
		$sql = mysqli_query($conn, "UPDATE orders SET status = 'declined' WHERE id = '$id'");
	}

	if ($sql) {
		header("Location: ../order_details.php?id=$id&r=processed");
		exit();
	}
}