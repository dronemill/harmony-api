<?php

use App\Models\Container;

class App_Models_ContainerTest extends TestCase {

	public function test_create()
	{
		$cloudinitContainer = parent::$factoryMuffin->create('App\Models\Container');

		$this->assertNotEmpty($cloudinitContainer);
		$this->assertInstanceOf('App\Models\Container', $cloudinitContainer);
	}

	public function test_container_volumes()
	{
		$volume = parent::$factoryMuffin->create('App\Models\ContainerVolume');

		$container = Container::with('container_volumes')->find($volume->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_volumes);

		$self = $this;
		$container->container_volumes->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerVolume', $v);
		});
	}

	public function test_container_envs()
	{
		$env = parent::$factoryMuffin->create('App\Models\ContainerEnv');

		$container = Container::with('container_envs')->find($env->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_envs);

		$self = $this;
		$container->container_envs->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerEnv', $v);
		});
	}

	public function test_container_nics()
	{
		$nic = parent::$factoryMuffin->create('App\Models\ContainerNic');

		$container = Container::with('container_nics')->find($nic->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_nics);

		$self = $this;
		$container->container_nics->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerNic', $v);
		});
	}

	public function test_container_dns()
	{
		$dns = parent::$factoryMuffin->create('App\Models\ContainerDns');

		$container = Container::with('container_dns')->find($dns->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_dns);

		$self = $this;
		$container->container_dns->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerDns', $v);
		});
	}

	public function test_container_exposes()
	{
		$expose = parent::$factoryMuffin->create('App\Models\ContainerExpose');

		$container = Container::with('container_exposes')->find($expose->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_exposes);

		$self = $this;
		$container->container_exposes->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerExpose', $v);
		});
	}

	public function test_container_links()
	{
		$links = parent::$factoryMuffin->create('App\Models\ContainerLink');

		$container = Container::with('container_links')->find($links->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_links);

		$self = $this;
		$container->container_links->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerLink', $v);
		});
	}

	public function test_container_publishs()
	{
		$publishs = parent::$factoryMuffin->create('App\Models\ContainerPublish');

		$container = Container::with('container_publishs')->find($publishs->container_id);

		$this->assertInstanceOf('App\Models\Container', $container);
		$this->assertInstanceOf('\Illuminate\Database\Eloquent\Collection', $container->container_publishs);

		$self = $this;
		$container->container_publishs->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\ContainerPublish', $v);
		});
	}

	// public function test_host()
	// {
	// 	$container = parent::$factoryMuffin->create('App\Models\Container');

	// 	$container = Container::with('host')->find($container->id);

	// 	$this->assertInstanceOf('App\Models\Container', $container);
	// 	$this->assertInstanceOf('App\Models\Host', $container->host);
	// }

	public function test_scopeWhereName()
	{
		$container = parent::$factoryMuffin->create('App\Models\Container');

		$find = Container::whereName($container->name)->first();

		$this->assertInstanceOf('App\Models\Container', $find);
		$this->assertEquals($find->name, $container->name);
	}

	public function test_scopeWhereHost()
	{
		$container = parent::$factoryMuffin->create('App\Models\Container');

		$find = Container::whereMachine($container->machine_id)->first();

		$this->assertInstanceOf('App\Models\Container', $find);
		$this->assertEquals($find->machine_id, $container->machine_id);
	}
}