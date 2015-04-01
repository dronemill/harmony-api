<?php

use App\Models\ContainerDns;

class ContainerDnsSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerDns');

		ContainerDns::create(array(
			'id'           => 1826535,
			'container_id' => 98263476,
			'nameserver'   => '8.8.8.8',
		));

		ContainerDns::create(array(
			'id'           => 13650797,
			'container_id' => 98263476,
			'nameserver'   => '4.2.2.4',
		));
	}

}
