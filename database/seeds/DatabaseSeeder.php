<?php

use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Model::unguard();

		if (! App::environment('testing', 'local'))
		{
			throw new Exception("UNSAFE: attempting to seed non testing, non local database!");
		}

		$this->call('MachineSeeder');
		$this->call('ContainerSeeder');
		$this->call('ContainerVolumeSeeder');
		$this->call('ContainerEnvSeeder');
		$this->call('ContainerNicSeeder');
		$this->call('ContainerDnsSeeder');
		$this->call('ContainerExposeSeeder');
		$this->call('ContainerPublishSeeder');
	}

}
