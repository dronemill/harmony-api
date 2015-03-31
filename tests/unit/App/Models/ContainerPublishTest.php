<?php

use App\Models\ContainerPublish;

class App_Models_ContainerPublishTest extends TestCase {

	public function test_create()
	{
		$publish = parent::$factoryMuffin->create('App\Models\ContainerPublish');

		$this->assertNotEmpty($publish);
		$this->assertInstanceOf('App\Models\ContainerPublish', $publish);
	}

	public function test_container()
	{
		$publish = parent::$factoryMuffin->create('App\Models\ContainerPublish');

		$publish = ContainerPublish::with('container')->find($publish->id);

		$this->assertInstanceOf('App\Models\ContainerPublish', $publish);
		$this->assertInstanceOf('App\Models\Container', $publish->container);
	}

	public function test_scopeWhereContainer()
	{
		$publish = parent::$factoryMuffin->create('App\Models\ContainerPublish');

		$find = ContainerPublish::whereContainer($publish->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerPublish', $find);
		$this->assertEquals($find->container_id, $publish->container_id);
	}
}