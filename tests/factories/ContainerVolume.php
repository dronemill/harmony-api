<?php

FactoryMuffin::define('App\Models\ContainerVolume')->setDefinitions([
	'id'             => FMaker::numberBetween(123456789, 987654321),
	'container_id'   => 'factory|App\Models\Container',
	'path_host'      => FMaker::sha1(),
	'path_container' => FMaker::sha1(),
]);
