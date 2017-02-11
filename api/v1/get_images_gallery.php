<?php 

include '../../php/app/database/Connection.php';
include '../../php/app/database/QueryBuilder.php';

$category_id = $_GET['category_id'];

$app['config'] = require '../../php/app/config.php';

$app['database'] = new QueryBuilder(
	Connection::make($app['config']['database'])
);

$images = json_encode($app['database']->find_all('images', $category_id));

echo $images;

?>