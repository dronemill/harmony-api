<?php

use App\Models\Container;

class ContainerSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\Container');

		Container::create(array(
			'id'          => '16461407840577296064',
			'machine_id'  => '5722763259656441665',
			'name'        => 'super_awesome_container',
			'hostname'    => 'super_awesome_container',
			// 'restart'  => 'on-failure:3',
			'image'       => 'ubuntu',
			'enabled'     => 1,
			'cmd'         => '/usr/bin/env top',
			'tty'         => true,
			'interactive' => true,
		));
	}

}
