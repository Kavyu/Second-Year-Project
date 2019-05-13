<?php
session_start();
// Redirect to the login page:
	session_destroy();
	unset($_SESSION['name']);
	header('Location: login.php');
	exit;


?>