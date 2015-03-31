<?php

use App\Models\Ambassador;

FactoryMuffin::define('App\Models\Ambassador')->setDefinitions([
	'id'                        => FMaker::numberBetween(123456789, 987654321),
	'container_id'              => 'factory|App\Models\Container',
	'producer_container_id'     => 'factory|App\Models\Container',
	'consumer_of_ambassador_id' => null,
	'type'                      => FMaker::randomElement([ Ambassador::TYPE_NETWORK, ]),
]);
