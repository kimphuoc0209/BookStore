<?php
session_start();

unset($_SESSION['cust_id']);

header("Location: index.php");