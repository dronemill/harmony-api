<?php

class Functional_ControllerTest extends TestCase {

	public function test_containersGet_host()
	{
		$this->seed();

		$response = $this->call(
			'GET',
			'/v1/containers',
			$paramaters = [],
			$cookies = [],
			$files = [],
			$server = []
		);

		$data = $response->getData(true);

		$this->assertTrue($response->isOk());
		$this->assertCount(1, $data['data']);
	}

	public function test_containersGet_host_byId()
	{
		$this->seed();

		parent::$factoryMuffin->create('App\Models\Container');

		$response = $this->call(
			'GET',
			'/v1/containers/98263476',
			$paramaters = [],
			$cookies = [],
			$files = [],
			$server = []
		);

		$data = $response->getData(true);

		$this->assertTrue($response->isOk());
		$this->assertCount(1, $data['data']);
	}

	public function test_host_containersPatch()
	{
		$this->seed();

		$response = $this->call(
			'PUT',
			'/v1/containers/98263476',
			$paramaters = [],
			$cookies = [],
			$files = [],
			$server = [
				'CONTENT_TYPE' => 'application/json',
				'ACCEPT' => 'application/json',
			],
			'{"data":{"type":"container","id":"98263476","cid":"abcdef"}}'
		);

		$this->assertTrue($response->isOk());

		$data = $response->getData(true);

		$this->assertSame("98263476", $data['data']['id']);
		$this->assertSame("abcdef", $data['data']['cid']);
	}


}
