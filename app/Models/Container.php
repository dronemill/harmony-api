<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use DroneMill\FoundationApi\Auth\Permission as AuthPermission;
use DroneMill\FoundationApi\Database\Model;

class Container extends Model {

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
	protected $table = 'container';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public $timestamps = true;

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
	 * Scope Where name
	 *
	 * @method  scopeWhereName
	 * @param   string      $name
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereName($query, $name)
	{
		return $query->where('name', '=', $name);
	}

	/**
	 * Scope Where machineId
	 *
	 * @method  scopeWhereMachineId
	 * @param   string      $machineId
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereMachine($query, $machineId)
	{
		return $query->where('machine_id', '=', $machineId);
	}

	/**
	 * get the volumes this container has
	 *
	 * @return  collection  the volumes
	 */
	public function container_volumes()
	{
		return $this->hasMany('App\Models\ContainerVolume', 'container_id', 'id');
	}

	/**
	 * get the envs this container has
	 *
	 * @return  collection  the envs
	 */
	public function container_envs()
	{
		return $this->hasMany('App\Models\ContainerEnv', 'container_id', 'id');
	}

	/**
	 * get the nics this container has
	 *
	 * @return  collection  the nics
	 */
	public function container_nics()
	{
		return $this->hasMany('App\Models\ContainerNic', 'container_id', 'id');
	}

	/**
	 * get the dns this container has
	 *
	 * @return  collection  the dns
	 */
	public function container_dns()
	{
		return $this->hasMany('App\Models\ContainerDns', 'container_id', 'id');
	}

	/**
	 * get the port[range[s]] this container is exposing
	 *
	 * @return  collection
	 */
	public function container_exposes()
	{
		return $this->hasMany('App\Models\ContainerExpose', 'container_id', 'id');
	}

	/**
	 * get the links this container has
	 *
	 * @return  collection
	 */
	public function container_links()
	{
		return $this->hasMany('App\Models\ContainerLink', 'container_id', 'id');
	}

	/**
	 * get the links this container has
	 *
	 * @return  collection
	 */
	public function container_publishs()
	{
		return $this->hasMany('App\Models\ContainerPublish', 'container_id', 'id');
	}

	/**
	 * get the ambassador this container has (if it has one)
	 *
	 * @return  Model
	 */
	public function ambassador()
	{
		return $this->hasOne('App\Models\Ambassador', 'container_id', 'id');
	}

	/**
	 * get the container that is the producer for this ambassador
	 *
	 * @return  collection
	 */
	public function producer_container()
	{
		return $this->hasOne('App\Models\Ambassador', 'producer_container_id', 'id');
	}
}
