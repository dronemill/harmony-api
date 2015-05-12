<?php

namespace App\Http\Controllers;

use DroneMill\FoundationApi\Http\Controllers\ApiController as FoundationController;

class ApiController extends FoundationController {

	protected $modelInflections = [
		'container_dns' => 'ContainerDns',
	];

}