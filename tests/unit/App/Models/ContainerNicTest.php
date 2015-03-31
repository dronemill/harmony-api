<?php

use App\Models\ContainerNic;

class App_Models_ContainerNicTest extends TestCase {

	public function test_create()
	{
		$nic = parent::$factoryMuffin->create('App\Models\ContainerNic');

		$this->assertNotEmpty($nic);
		$this->assertInstanceOf('App\Models\ContainerNic', $nic);
	}

	public function test_container()
	{
		$nic = parent::$factoryMuffin->create('App\Models\ContainerNic');

		$nic = ContainerNic::with('container')->find($nic->id);

		$this->assertInstanceOf('App\Models\ContainerNic', $nic);
		$this->assertInstanceOf('App\Models\Container', $nic->container);
	}

	public function test_scopeWhereContainer()
	{
		$nic = parent::$factoryMuffin->create('App\Models\ContainerNic');

		$find = ContainerNic::whereContainer($nic->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerNic', $find);
		$this->assertEquals($find->container_id, $nic->container_id);
	}
}