<?php 
#Includes necessary files.
include 'dbh.php';
include 'functions.php';
include 'mp_auth.php';

#If login button clicked
if (isset($_POST['loginBtn'])) {
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);

	#Then let's Login
	if (login($username, $password)) {
		header("Location: ../products.php");
		exit();
	}else{
		header("Location: ../index.php?r=error");
		exit();
	}
}

#Register user
if (isset($_POST['regBtn'])) {
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$uname = mysqli_real_escape_string($conn, $_POST['user']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$role  = mysqli_real_escape_string($conn, $_POST['role']);
	$pass  = mysqli_real_escape_string($conn, $_POST['pass']);
	
	if (register_user($fname, $lname, $email, $uname, $role, $pass)) {
		header("Location: ../users.php?r=added");
		exit();
	}
}

#Delete user
if (isset($_GET['del']) && $_GET['del'] == 'user') {
	if (delete_data('auth_users', 'id', $_GET['id'])) {
		header("Location: ../users.php?r=deleted");
		exit();
	}
}