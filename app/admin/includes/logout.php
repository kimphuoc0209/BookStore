<?php 
#Start Session
session_start();

#Destroy Sessions
session_destroy();

#Redirect to login page
header("Location: ../../index.php");