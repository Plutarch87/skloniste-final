<?php 

require '../../app/bootstrap.php';

$id = $_GET['id'];

$query = $app['database'];

$prof = $query->show('users', $id);

$query->destroy('users', $id);

header('Location: index.php');