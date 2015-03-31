<?php

use App\Models\ContainerEnv;

class App_Models_ContainerEnvTest extends TestCase {

	public function test_create()
	{
		$env = parent::$factoryMuffin->create('App\Models\ContainerEnv');

		$this->assertNotEmpty($env);
		$this->assertInstanceOf('App\Models\ContainerEnv', $env);
	}

	public function test_container()
	{
		$env = parent::$factoryMuffin->create('App\Models\ContainerEnv');

		$env = ContainerEnv::with('container')->find($env->id);

		$this->assertInstanceOf('App\Models\ContainerEnv', $env);
		$this->assertInstanceOf('App\Models\Container', $env->container);
	}

	public function test_scopeWhereContainer()
	{
		$env = parent::$factoryMuffin->create('App\Models\ContainerEnv');

		$find = ContainerEnv::whereContainer($env->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerEnv', $find);
		$this->assertEquals($find->container_id, $env->container_id);
	}
}