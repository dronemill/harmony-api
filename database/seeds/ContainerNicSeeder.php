<?php

use App\Models\ContainerNic;

class ContainerNicSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerNic');

		ContainerNic::create(array(
			'id'            => 12768523,
			'container_id'  => '16461407840577296064',
			'bridge_dev'    => 'em1',
			'container_dev' => 'eth1',
			'ip'            => '169.254.1.10',
			'netmask'       => '255.255.0.0',
			'gateway'       => '169.254.1.1',
		));
	}

}
