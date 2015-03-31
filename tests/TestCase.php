<?php

use DroneMill\FoundationApi\Testing\TestCase as FoundationTestCase;

class TestCase extends FoundationTestCase {

	/**
	 * we need to define the basepath of the application, because at this
	 * point the application isnt created.
	 */
	const BASE_PATH = __DIR__ . '/..';
	const FACTORIES_PATH = __DIR__ . '/factories';

	/**
	 * Creates the application.
	 *
	 * @return \Illuminate\Foundation\Application
	*/
	public function createApplication()
	{
		$app = require __DIR__.'/../bootstrap/app.php';

		$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

		return $app;
	}

	public static function setupBeforeClass()
	{
		parent::setupBeforeClass();
	}

	public function setUp()
	{
		parent::setUp();
	}

	protected function migrateUp()
	{
		Artisan::call('migrate', ['--env' => 'testing', ]);
	}

	protected function migrateDown()
	{
		Artisan::call('migrate:reset', ['--env' => 'testing']);
	}

	public function cleanup()
	{

	}

	public function tearDown()
	{
		parent::tearDown();
	}

	public static function resetModelEvents($pathToModels = [])
	{
		$pathToModels = [
			['path' => app_path() . '/Models', 'namespace' => '\App\Models'],
		];

		parent::resetModelEvents($pathToModels);
	}
}