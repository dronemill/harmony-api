<?php

use App\Models\ContainerPublish;

class ContainerPublishSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\ContainerPublish');

		ContainerPublish::create(array(
			'id'             => '765634872325',
			'container_id'   => '164614078405772',
			'container_port' => '80',
			'host_port'      => '80',
		));

		ContainerPublish::create(array(
			'id'             => '6723453687222',
			'container_id'   => '164614078405772',
			'container_port' => '443',
			'host_port'      => '443',
		));
	}

}
