<?php namespace App\Commands;

use App;
use App\Commands\Command;
use App\Models\Container;
use DroneMill\EventsocketClient\Client;
use Log;
use Config;

use Illuminate\Contracts\Bus\SelfHandling;


class PushBatondUpdatedContainer extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct(Container $container)
	{
		$this->container = $container;
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		// if we are running unit tests, then don't sent a push noticifation
		if (App::environment('testing'))
		{
			return;
		}

		$machine = $this->container->machine()->first();

		// if we dont have a machine record, then abort push
		if (empty($machine))
		{
			Log::error('Aborting Portal event push becuase machine not found', [
				'container_id' => $this->container->id,
				'event'        => 'batond-container-updated',
			]);

			return;
		}

		$event = 'harmony.machine-'. $machine->id . '.batond-container-updated';

		$harmony = new Client(Config::get('harmony.portal.url'));
		$harmony->emit($event, ['ContainerID' => $this->container->id]);

		Log::info('Emitted Portal event', ['event' => $event, 'container_id' => $this->container->id]);
	}

}
