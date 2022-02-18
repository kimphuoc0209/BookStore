<?php

// Fetch all or one row
function fetch_data($table, $field = FALSE, $val = FALSE, $limit=FALSE){
	global $conn;
	if ($field === FALSE && $val === FALSE){
		$table = ($limit !== FALSE) ? $table." LIMIT ".$limit : $table;
			
		$sql = mysqli_query($conn, "SELECT * FROM {$table}");
		return mysqli_fetch_all($sql, MYSQLI_ASSOC);
	}else{
		$sql = mysqli_query($conn, "SELECT * FROM {$table} WHERE $field = '$val'");
		return  mysqli_fetch_all($sql, MYSQLI_ASSOC);
	}
}

// Fetch single data
function fetch_row($table, $field, $val){
	global $conn;
	$sql = mysqli_query($conn, "SELECT * FROM {$table} WHERE $field = '$val'");
	return  mysqli_fetch_assoc($sql);
}

// Delete items
function delete_data($table, $field, $val){
	global $conn;
	$sql = mysqli_query($conn, "DELETE FROM {$table} WHERE {$field} = {$val}");
	if ($sql) return true;
	return mysqli_error($conn);
}

#Split date and time
function split_time($date){
	$new = explode(" ", $date);
	$new = $new[0];

	$new = date("d-m-Y", strtotime($new));
	return $new;
}

// Last Login
function last_login($time){

	if ($time == '') {
		return $time;
	}

	$time = strtotime($time);

	if ($time >= strtotime("today 00:00")) {
    	return "Today at " . date("h:i A", $time);
    } elseif ($time >= strtotime("yesterday 00:00")) {
        return "Yesterday at " . date("h:i A", $time);
    } elseif ($time >= strtotime("-6 day 00:00")) {
        return date("l \\a\\t h:i A", $time);
    } else {
        return date("M j, Y", $time);
    }
}