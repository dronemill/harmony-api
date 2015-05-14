<?php namespace App\Commands;

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
		$harmony = new Client(Config::get('harmony.portal.url'));
		$harmony->emit('batond-container-updated', ['ContainerID' => $this->container->id]);

		Log::info('Emitted Portal event', ['event' => 'batond-container-updated', 'container_id' => $this->container->id]);
	}

}
