<?php

use App\Models\ContainerExpose;

class ContainerExposeSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerExpose');

		ContainerExpose::create(array(
			'id'           => '2879346234789',
			'container_id' => '164614078405772',
			'range_start'  => '80',
		));

		ContainerExpose::create(array(
			'id'           => '8746873246587',
			'container_id' => '164614078405772',
			'range_start'  => '443',
		));
	}

}
