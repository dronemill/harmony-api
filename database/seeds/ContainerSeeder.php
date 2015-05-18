<?php

use App\Models\Container;

class ContainerSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\Container');

		Container::create([
			'id'          => '164614078405772',
			'machine_id'  => '572276325965644',
			'name'        => 'super_awesome_container',
			'hostname'    => 'super_awesome_container',
			// 'restart'  => 'on-failure:3',
			'image'       => 'ubuntu',
			'enabled'     => 1,
			'cmd'         => '/usr/bin/env top',
			'tty'         => 1,
			'interactive' => 1,
		]);
	}

}
