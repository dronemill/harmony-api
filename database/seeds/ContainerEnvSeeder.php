<?php

use App\Models\ContainerEnv;

class ContainerEnvSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerEnv');

		ContainerEnv::create(array(
			'id'           => 876523,
			'container_id' => '164614078405772',
			'name'         => 'SUPER_AWESOME_VAR',
			'value'        => 'aweyeah',
		));
	}

}
