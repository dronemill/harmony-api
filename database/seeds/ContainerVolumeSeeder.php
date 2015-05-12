<?php

use App\Models\ContainerVolume;

class ContainerVolumeSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerVolume');

		ContainerVolume::create(array(
			'id'             => 23478983,
			'container_id'   => '16461407840577296064',
			'path_host'      => '/tmp/volume',
			'path_container' => '/tmp/volume_epgNxFOydfwtIYkzPnlKTVskzy', // yep some random text
		));
	}

}
