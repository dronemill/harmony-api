<?php

use App\Models\AmbassadorTypeNetwork;

class App_Models_AmbassadorTypeNetworkTest extends TestCase {

	public function test_create()
	{
		$ambassadorTypeNetwork = parent::$factoryMuffin->create('App\Models\AmbassadorTypeNetwork');

		$this->assertNotEmpty($ambassadorTypeNetwork);
		$this->assertInstanceOf('App\Models\AmbassadorTypeNetwork', $ambassadorTypeNetwork);
	}

	public function test_ambassador()
	{
		$ambassadorTypeNetwork = parent::$factoryMuffin->create('App\Models\AmbassadorTypeNetwork');

		$ambassadorTypeNetwork = AmbassadorTypeNetwork::with('ambassador')->find($ambassadorTypeNetwork->id);

		$this->assertInstanceOf('App\Models\AmbassadorTypeNetwork', $ambassadorTypeNetwork);
		$this->assertInstanceOf('App\Models\Ambassador', $ambassadorTypeNetwork->ambassador);
	}

	public function test_scopeWhereAmbassador()
	{
		$ambassadorTypeNetwork = parent::$factoryMuffin->create('App\Models\AmbassadorTypeNetwork');

		$find = AmbassadorTypeNetwork::whereAmbassador($ambassadorTypeNetwork->ambassador_id)->first();

		$this->assertInstanceOf('App\Models\AmbassadorTypeNetwork', $find);
		$this->assertEquals($find->ambassador_id, $ambassadorTypeNetwork->ambassador_id);
	}
}