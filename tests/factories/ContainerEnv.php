<?php

FactoryMuffin::define('App\Models\ContainerEnv')->setDefinitions([
	'id'           => FMaker::numberBetween(123456789, 987654321),
	'container_id' => 'factory|App\Models\Container',
	'name'         => FMaker::word(),
	'value'        => FMaker::sha1(),
]);
