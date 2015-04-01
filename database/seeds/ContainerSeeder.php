<?php

use App\Models\Container;

class ContainerSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\Container');

		Container::create(array(
			'id'       => 98263476,
			'host_id'  => 1,
			'name'     => 'super_awesome_container',
			'hostname' => 'super_awesome_container',
			// 'restart'  => 'on-failure:3',
			'image'    => 'ubuntu',
			'enabled'  => 1,
		));
	}

}
