<?php
include 'rb.php';
session_start();
if (isset($_SESSION['logged_user'])) {
	unset($_SESSION['logged_user']);
	session_destroy();
	header('Location: http://social/index.php');
} else {
	header('Location: http://social/index.php');
} 
