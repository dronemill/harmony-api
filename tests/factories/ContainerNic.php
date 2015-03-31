<?php

FactoryMuffin::define('App\Models\ContainerNic')->setDefinitions([
	'id'            => FMaker::numberBetween(123456789, 987654321),
	'container_id'  => 'factory|App\Models\Container',
	'bridge_dev'    => FMaker::word(),
	'container_dev' => FMaker::word(),
	'ip'            => FMaker::ipv4(),
	'netmask'       => FMaker::ipv4(),
	'gateway'       => FMaker::ipv4(),
]);
