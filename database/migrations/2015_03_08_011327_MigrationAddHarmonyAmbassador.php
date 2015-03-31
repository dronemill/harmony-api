<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MigrationAddHarmonyAmbassador extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::connection('harmony')->create('ambassador', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->tinyInteger('type');
			$table->bigInteger('producer_container_id')->nullable()->default(null);
			$table->bigInteger('consumer_of_ambassador_id')->nullable()->default(null);

			$table->primary('id');
			$table->unique(['container_id', 'type', 'producer_container_id'], 'unique_producer');
		});

		Schema::connection('harmony')->create('ambassador_type_network', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('ambassador_id')->unsigned();
			$table->smallInteger('producer_port');
			$table->smallInteger('ambassador_host_port');
			$table->boolean('ssl')->nullable()->default(null);
			$table->text('ssl_server_pem')->nullable()->default(null);
			$table->text('ssl_server_crt')->nullable()->default(null);
			$table->text('ssl_client_pem')->nullable()->default(null);
			$table->text('ssl_client_crt')->nullable()->default(null);
			$table->timestamp('ssl_expires')->nullable()->default(null);

			$table->primary('id');
			$table->unique('ambassador_id');
		});

		Schema::connection('harmony')->create('container_expose', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->smallInteger('range_start')->unsigned();
			$table->smallInteger('range_end')->unsigned()->nullable()->default(null);

			$table->primary('id');
		});

		Schema::connection('harmony')->create('container_publish', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->smallInteger('container_port')->unsigned();
			$table->smallInteger('host_port')->unsigned()->nullable()->default(null);
			$table->string('ip', 16)->nullable()->default(null);

			$table->primary('id');
		});

		Schema::connection('harmony')->create('container_link', function(Blueprint $table)
		{
			$table->engine = 'InnoDB';

			$table->bigInteger('id')->unsigned();
			$table->bigInteger('container_id')->unsigned();
			$table->bigInteger('container_from_id')->unsigned();
			$table->string('name', 30);

			$table->primary('id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::connection('harmony')->drop('container_link');
		Schema::connection('harmony')->drop('container_publish');
		Schema::connection('harmony')->drop('container_expose');
		Schema::connection('harmony')->drop('ambassador_type_network');
		Schema::connection('harmony')->drop('ambassador');

	}

}
