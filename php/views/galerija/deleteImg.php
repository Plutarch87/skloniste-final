<?php 

require '../../app/bootstrap.php';

$filename = $_GET['filename'];

$query = $app['database'];

if(file_exists(__DIR__.'/../assets/images/'.$filename)):
	$query->destroyImg('images', $filename);
	unlink(__DIR__.'/../assets/images/'.$filename);
endif;

header('Location: index.php');