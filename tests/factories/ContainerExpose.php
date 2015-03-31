<?php

FactoryMuffin::define('App\Models\ContainerExpose')->setDefinitions([
	'id'       => FMaker::numberBetween(123456789, 987654321),
	'container_id'  => 'factory|App\Models\Container',
	'range_start' => FMaker::numberBetween(5000, 9000),
]);
