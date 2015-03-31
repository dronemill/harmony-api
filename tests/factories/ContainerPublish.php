<?php

FactoryMuffin::define('App\Models\ContainerPublish')->setDefinitions([
	'id'             => FMaker::numberBetween(123456789, 987654321),
	'container_id'   => 'factory|App\Models\Container',
	'container_port' => FMaker::numberBetween(5000, 9000),
]);
