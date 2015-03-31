<?php

use App\Models\ContainerLink;

class App_Models_ContainerLinkTest extends TestCase {

	public function test_create()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$this->assertNotEmpty($link);
		$this->assertInstanceOf('App\Models\ContainerLink', $link);
	}

	public function test_container()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$link = ContainerLink::with('container')->find($link->id);

		$this->assertInstanceOf('App\Models\ContainerLink', $link);
		$this->assertInstanceOf('App\Models\Container', $link->container);
	}

	public function test_container_from()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$link = ContainerLink::with('container_from')->find($link->id);

		$this->assertInstanceOf('App\Models\ContainerLink', $link);
		$this->assertInstanceOf('App\Models\Container', $link->container_from);
	}

	public function test_scopeWhereContainer()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$find = ContainerLink::whereContainer($link->container_id)->first();

		$this->assertInstanceOf('App\Models\ContainerLink', $find);
		$this->assertEquals($find->container_id, $link->container_id);
	}

	public function test_scopeWhereContainerFrom()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$find = ContainerLink::whereContainerFrom($link->container_from_id)->first();

		$this->assertInstanceOf('App\Models\ContainerLink', $find);
		$this->assertEquals($find->container_from_id, $link->container_from_id);
	}

	public function test_scopeWhereName()
	{
		$link = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$find = ContainerLink::whereName($link->name)->first();

		$this->assertInstanceOf('App\Models\ContainerLink', $find);
		$this->assertEquals($find->name, $link->name);
	}
}