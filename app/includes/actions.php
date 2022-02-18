<?php 
// Include Connection and Functions files
include 'dbh.php';
include 'functions.php';

// Cancel Order
//hủy đơn hàng
if (isset($_GET['act']) && $_GET['act'] == 'ca') {
	$id = $_GET['id'];

	if (delete_data('orders', 'id', $id)) {
		header("Location: ../orders.php");
	}
}
// Gửi phản hồi ,database được gửi vào messages
if (isset($_POST['send-msg'])) {
	$fname = $_POST['fname'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$msg   = $_POST['msg'];

	$sql = mysqli_query($conn, "INSERT INTO messages VALUES ('', '$fname', '$email', '$phone' ,'$msg')");
	if ($sql) {
		header("Location: ../contact.php?r=succcess");
	}
}