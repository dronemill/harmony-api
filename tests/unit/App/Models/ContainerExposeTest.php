<?php

use App\Models\ContainerExpose;

class App_Models_ContainerExposeTest extends TestCase {

	public function test_create()
	{
		$expose = parent::$factoryMuffin->create('App\Models\ContainerExpose');

		$this->assertNotEmpty($expose);
		$this->assertInstanceOf('App\Models\ContainerExpose', $expose);
	}

	public function test_container()
	{
		$expose = parent::$factoryMuffin->create('App\Models\ContainerExpose');

		$expose = ContainerExpose::with('container')->find($expose->id);

		$this->assertInstanceOf('App\Models\ContainerExpose', $expose);
		$this->assertInstanceOf('App\Models\Container', $expose->container);
	}

	public function test_scopeWhereContainer()
	{
		$expose = parent::$factoryMuffin->create('App\Models\ContainerExpose');

		$find = ContainerExpose::whereContainer($expose->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerExpose', $find);
		$this->assertEquals($find->container_id, $expose->container_id);
	}
}