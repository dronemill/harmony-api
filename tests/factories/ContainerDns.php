<?php

FactoryMuffin::define('App\Models\ContainerDns')->setDefinitions([
	'id'            => FMaker::numberBetween(123456789, 987654321),
	'container_id'  => 'factory|App\Models\Container',
	'nameserver'    => FMaker::ipv4(),
]);
