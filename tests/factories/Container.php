<?php

FactoryMuffin::define('App\Models\Container')->setDefinitions([
	'id'         => FMaker::numberBetween(123456789, 987654321),
	'machine_id' => FMaker::numberBetween(123456789, 987654321),
	'name'       => FMaker::unique()->word(),
	'hostname'   => FMaker::unique()->domainName(),
	'restart'    => 'on-failure:3',
	'image'      => FMaker::bothify(FMaker::getGenerator()->domainName . '/?????/?????:#.#.#'),
	'enabled'    => true,
]);
