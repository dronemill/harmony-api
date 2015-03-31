<?php

use App\Models\ContainerVolume;

class App_Models_ContainerVolumeTest extends TestCase {

	public function test_create()
	{
		$volume = parent::$factoryMuffin->create('App\Models\ContainerVolume');

		$this->assertNotEmpty($volume);
		$this->assertInstanceOf('App\Models\ContainerVolume', $volume);
	}

	public function test_container()
	{
		$volume = parent::$factoryMuffin->create('App\Models\ContainerVolume');

		$volume = ContainerVolume::with('container')->find($volume->id);

		$this->assertInstanceOf('App\Models\ContainerVolume', $volume);
		$this->assertInstanceOf('App\Models\Container', $volume->container);
	}

	public function test_scopeWhereContainer()
	{
		$volume = parent::$factoryMuffin->create('App\Models\ContainerVolume');

		$find = ContainerVolume::whereContainer($volume->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerVolume', $find);
		$this->assertEquals($find->container_id, $volume->container_id);
	}
}