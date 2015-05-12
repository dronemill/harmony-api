<?php

// use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitialMigration extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('harmony')->create('machine', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->string('name', 32);
			$table->string('hostname', 64);
			$table->string('ip', 16);
			$table->timestamps();

			$table->primary('id');
			$table->unique('name');
		});

		Schema::connection('harmony')->create('container', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('machine_id')->unsigned();
			$table->string('cid'        , 64)->nullable()->default(null);
			$table->string('name'       , 30);
			$table->string('hostname'   , 64);
			$table->string('restart'    , 16)->nullable()->default(null);
			$table->string('image'      , 128);
			$table->string('cmd'        , 128)->nullable()->default(null);
			$table->string('entry_point', 128)->nullable()->default(null);
			$table->boolean('interactive')->default(false);
			$table->boolean('tty')->default(false);
			$table->boolean('enabled')->default(false);
			$table->timestamps();

			$table->primary('id');
			$table->unique('cid');
			$table->unique('name');
			$table->unique('hostname');
			$table->index(['machine_id', 'enabled'], 'harmony_host_index');
		});

		Schema::connection('harmony')->create('container_volume', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->string('path_host'     , 256); // FIXME Need to make this a better number
			$table->string('path_container', 256); // FIXME Need to make this a better number

			$table->primary('id');
		});

		Schema::connection('harmony')->create('container_env', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->string('name' , 32);
			$table->text('value')->nullable()->default(null);

			$table->primary('id');
		});

		Schema::connection('harmony')->create('container_nic', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->string('bridge_dev'   , 16);
			$table->string('container_dev', 16);
			$table->string('ip'           , 16);
			$table->string('netmask'      , 16);
			$table->string('gateway'      , 16);

			$table->primary('id');
			$table->unique('ip');
		});

		Schema::connection('harmony')->create('container_dns', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->string('nameserver'   , 16);

			$table->primary('id');
			$table->unique(['container_id', 'nameserver'], 'container_dns_unique_index');
		});


	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('harmony')->drop('container_dns');
		Schema::connection('harmony')->drop('container_nic');
		Schema::connection('harmony')->drop('container_env');
		Schema::connection('harmony')->drop('container_volume');
		Schema::connection('harmony')->drop('container');
		Schema::connection('harmony')->drop('machine');
	}

}
