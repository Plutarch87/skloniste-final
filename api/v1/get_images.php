<?php 


include '../../php/app/database/Connection.php';
include '../../php/app/database/QueryBuilder.php';

$app['config'] = require '../../php/app/config.php';

$app['database'] = new QueryBuilder(
	Connection::make($app['config']['database'])
);

$images = json_encode($app['database']->getAll('images'));

echo $images;


?>