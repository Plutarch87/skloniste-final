<?php
isset($_SESSION['email']) ?: header('Location: ../views/auth/admin.login.php') ;
require 'bootstrap.php';
 $email = $_POST['email'];
$password = sha1($_POST['password']);

$query = $app['database'];

$stmt = $query->check($email, $password);

if (in_array($email, $stmt) && in_array($password, $stmt) !== false):
	$_SESSION['email'] = $stmt['email'];
 	header('Location: ../views/admin.index.php');
 else:
 	$message = 'Hm... Nesto nije u redu... Probaj opet';
 	$_SESSION['message'] = $message;
 endif;