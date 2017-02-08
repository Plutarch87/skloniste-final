<?php
require '../../app/bootstrap.php';

$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
if($password == $confirm_password) {
	$db = $app['database'];

	$db->storeAdmin('users', $name, $surname, $email, $password);

	header('Location: index.php');
} else {
	$message = 'Lozinke se ne poklapaju... Probajte opet.';
	$_SESSION['message'] = $message;
}