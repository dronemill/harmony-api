<?php

use App\Models\Machine;

class MachineSeeder extends Seeder {

	public function run()
	{
		$this->SmartTruncate('App\Models\Machine');

		Machine::create(array(
			'id'       => '5722763259656441665',
			'name'     => 'machine0',
			'hostname' => 'machine0.dev.harmony.dev',
			'ip'       => '192.168.194.10',
		));
	}

}
