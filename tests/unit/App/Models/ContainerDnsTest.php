<?php

use App\Models\ContainerDns;

class App_Models_ContainerDnsTest extends TestCase {

	public function test_create()
	{
		$dns = parent::$factoryMuffin->create('App\Models\ContainerDns');

		$this->assertNotEmpty($dns);
		$this->assertInstanceOf('App\Models\ContainerDns', $dns);
	}

	public function test_container()
	{
		$dns = parent::$factoryMuffin->create('App\Models\ContainerDns');

		$dns = ContainerDns::with('container')->find($dns->id);

		$this->assertInstanceOf('App\Models\ContainerDns', $dns);
		$this->assertInstanceOf('App\Models\Container', $dns->container);
	}

	public function test_scopeWhereContainer()
	{
		$dns = parent::$factoryMuffin->create('App\Models\ContainerDns');

		$find = ContainerDns::whereContainer($dns->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerDns', $find);
		$this->assertEquals($find->container_id, $dns->container_id);
	}
}