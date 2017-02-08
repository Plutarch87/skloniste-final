<?php 

$app = [];

$app['config'] = require '../../php/app/config.php';

require '../../php/app/database/Connection.php';
require '../../php/app/database/QueryBuilder.php';

$app['database'] = new QueryBuilder(
	Connection::make($app['config']['database'])
);

$profesori[] = [json_encode($app['database']->getAll('profesori'))];

foreach ($profesori[0] as $profesor) {
	echo $profesor;
}

?>