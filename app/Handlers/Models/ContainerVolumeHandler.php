<?php

namespace App\Handlers\Models;

// use Symfony\Component\HttpFoundation\Response;
use App\Models\ContainerVolume;

use EchoIt\JsonApi\Exception as ApiException;
use EchoIt\JsonApi\Request as ApiRequest;
use DroneMill\FoundationApi\Handlers\Api as ApiHandler;
use Request;

/**
* Handles API requests for ContainerVolume
*/
class ContainerVolumeHandler extends ApiHandler
{
	const ERROR_SCOPE = 1033;

	/**
	 * The model that this handler handles
	 *
	 * @var  string
	 */
	protected $model = 'App\Models\ContainerVolume';

	/**
	 * List of relations that can be included in response.
	 */
	protected static $exposedRelations = [
		'container',
	];

	/**
		* Handles GET requests.
		* @param EchoIt\JsonApi\Request $request
		* @return EchoIt\JsonApi\Model|Illuminate\Support\Collection|EchoIt\JsonApi\Response|Illuminate\Pagination\LengthAwarePaginator
	 */
	public function handleGet(ApiRequest $request)
	{
		//you can use the default GET functionality, or override with your own
		return $this->handleGetDefault($request, new ContainerVolume);
	}

	/**
	 * Handles PUT requests.
	 * @param EchoIt\JsonApi\Request $request
	 * @return EchoIt\JsonApi\Model|Illuminate\Support\Collection|EchoIt\JsonApi\Response
	 */
	public function handlePut(ApiRequest $request)
	{
		//you can use the default PUT functionality, or override with your own
		return $this->handlePutDefault($request, new ContainerVolume);
	}
}