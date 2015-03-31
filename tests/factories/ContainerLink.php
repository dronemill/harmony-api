<?php

FactoryMuffin::define('App\Models\ContainerLink')->setDefinitions([
	'id'                => FMaker::numberBetween(123456789, 987654321),
	'container_id'      => 'factory|App\Models\Container',
	'container_from_id' => 'factory|App\Models\Container',
	'name'              => FMaker::unique()->word(),
]);
