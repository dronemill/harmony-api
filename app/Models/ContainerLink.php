<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use DroneMill\FoundationApi\Auth\Permission as AuthPermission;
use DroneMill\FoundationApi\Database\Model;

class ContainerLink extends Model {

	/**
	 * The database connection used by the model.
	 *
	 * @var string
	 */
	protected $connection = 'harmony';

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'container_link';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public $timestamps = false;

	/**
	 * primary key is not auto-incrementing
	 *
	 * @var  boolean
	 */
	public $incrementing = false;


	/**
	 * Eagerly load values
	 *
	 * @var  array
	 */
	protected $with = [];

    /**
     * The resource type. If null, when the model is rendered,
     * the table name will be used
     *
     * @var  null|string
     */
    protected $resourceType = 'containerLinks';

	/**
	 * Scope Where Container
	 *
	 * @method  scopeWhereContainer
	 * @param   string      $container_id
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereContainer($query, $container_id)
	{
		if (! $container_id) return $query;

		return $query->where('container_id', $container_id);
	}

	/**
	 * Scope Where ContainerFrom
	 *
	 * @method  scopeWhereContainerFrom
	 * @param   string      $container_id
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereContainerFrom($query, $container_id)
	{
		if (! $container_id) return $query;

		return $query->where('container_from_id', $container_id);
	}

	/**
	 * Scope Where Name
	 *
	 * @method  scopeWhereName
	 * @param   string      $name
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereName($query, $name)
	{
		if (! $name) return $query;

		return $query->where('name', $name);
	}

	/**
	 * fetch the container that this containerVolume belongs on
	 *
	 * @method  container
	 * @return  Eloquent Relationship
	 */
	public function container()
	{
		return $this->belongsTo('App\Models\Container', 'container_id', 'id');
	}

	/**
	 * fetch the container that this containerVolume belongs on
	 *
	 * @method  container
	 * @return  Eloquent Relationship
	 */
	public function container_from()
	{
		return $this->belongsTo('App\Models\Container', 'container_from_id', 'id');
	}
}
