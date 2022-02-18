<?php 
#Split date and time
// Hiển thị ngày tháng năm 
function split_time($date){
	$new = explode(" ", $date);
	$new = $new[0];

	$new = date("d-m-Y", strtotime($new));
	return $new;
}

// DETELE
// xóa dữ liệu trong database
function delete_data($table, $field, $val){
	global $conn;
	$sql = mysqli_query($conn, "DELETE FROM {$table} WHERE $field = {$val}");
	if ($sql) return true;
	return mysqli_error($conn);
}