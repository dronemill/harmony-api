<?php

use App\Models\Ambassador;

class App_Models_AmbassadorTest extends TestCase {

	public function test_create()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador');

		$this->assertNotEmpty($ambassador);
		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
	}

	public function test_scopeWhereContainer()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador');

		$find = Ambassador::whereContainer($ambassador->container_id)->first();

		$this->assertInstanceOf('App\Models\Ambassador', $find);
		$this->assertEquals($find->container_id, $ambassador->container_id);
	}

	public function test_container()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador');

		$ambassador = Ambassador::with('container')->find($ambassador->id);

		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
		$this->assertInstanceOf('App\Models\Container', $ambassador->container);
	}

	public function test_producer_container()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador');

		$ambassador = Ambassador::with('producer_container')->find($ambassador->id);

		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
		$this->assertInstanceOf('App\Models\Container', $ambassador->producer_container);
	}

	public function test_consumer_of_ambassador()
	{
		$ambassador_tmp = parent::$factoryMuffin->create('App\Models\Ambassador');
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador', [
			'producer_container_id' => null,
			'consumer_of_ambassador_id' => $ambassador_tmp->id,
		]);

		$ambassador = Ambassador::with('consumer_of_ambassador')->find($ambassador->id);

		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
		$this->assertInstanceOf('App\Models\Ambassador', $ambassador->consumer_of_ambassador);
	}

	public function test_ambassador_type_network()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\AmbassadorTypeNetwork');

		$ambassador = Ambassador::with('ambassador_type_network')->find($ambassador->ambassador_id);

		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
		$this->assertInstanceOf('App\Models\AmbassadorTypeNetwork', $ambassador->ambassador_type_network);
	}

	public function test_consumers()
	{
		$ambassador = parent::$factoryMuffin->create('App\Models\Ambassador');
		parent::$factoryMuffin->create('App\Models\Ambassador', [
			'producer_container_id' => null,
			'consumer_of_ambassador_id' => $ambassador->id,
		]);

		$ambassador = Ambassador::with('consumers')->find($ambassador->id);

		$this->assertInstanceOf('App\Models\Ambassador', $ambassador);
		$this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $ambassador->consumers);

		$self = $this;
		$ambassador->consumers->each(function($v) use ($self)
		{
			$self->assertInstanceOf('App\Models\Ambassador', $v);
		});
	}


}