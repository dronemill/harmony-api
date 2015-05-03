<?php

namespace App\Handlers\Models;

// use Symfony\Component\HttpFoundation\Response;
use App\Models\Container;

use EchoIt\JsonApi\Exception as ApiException;
use EchoIt\JsonApi\Request as ApiRequest;
use DroneMill\FoundationApi\Handlers\Api as ApiHandler;
use Request;

/**
* Handles API requests for Container
*/
class ContainerHandler extends ApiHandler
{
	const ERROR_SCOPE = 1024;

	/**
	 * The model that this handler handles
	 *
	 * @var  string
	 */
	protected $model = 'App\Models\Container';

	/**
	 * List of relations that can be included in response.
	 */
	protected static $exposedRelations = [
		'container_envs',
		'container_volumes',
		'container_nics',
		'container_dns',
		'container_exposes',
		'container_links',
		'container_publishs',
		'ambassador',
		'producer_container',
	];

	/**
	 * Handles GET requests.
	 * @param EchoIt\JsonApi\Request $request
	 * @return EchoIt\JsonApi\Model|Illuminate\Support\Collection|EchoIt\JsonApi\Response|Illuminate\Pagination\LengthAwarePaginator
	 */
	public function handleGet(ApiRequest $request)
	{
		//you can use the default GET functionality, or override with your own
		return $this->handleGetDefault($request, new Container);
	}

	/**
	 * Handles PUT requests.
	 * @param EchoIt\JsonApi\Request $request
	 * @return EchoIt\JsonApi\Model|Illuminate\Support\Collection|EchoIt\JsonApi\Response
	 */
	public function handlePut(ApiRequest $request)
	{
		//you can use the default PUT functionality, or override with your own
		return $this->handlePutDefault($request, new Container);
	}
}