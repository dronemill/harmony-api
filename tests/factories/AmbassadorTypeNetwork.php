<?php

FactoryMuffin::define('App\Models\AmbassadorTypeNetwork')->setDefinitions([
	'id'                   => FMaker::numberBetween(123456789, 987654321),
	'ambassador_id'        => 'factory|App\Models\Ambassador',
	'producer_port'        => FMaker::numberBetween(5000, 9000),
	'ambassador_host_port' => FMaker::numberBetween(5000, 9000),
]);
