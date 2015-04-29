<?php

namespace App\Models;

use DroneMill\FoundationApi\Auth\Permission as AuthPermission;
use DroneMill\FoundationApi\Database\Model;
use Illuminate\Database\Eloquent\Collection;

class Ambassador extends Model {

	const TYPE_NETWORK = 10;

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
	protected $table = 'ambassador';

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
    protected $resourceType = 'ambassadors';

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
	 * fetch the producer that this container is ambassadoring
	 *
	 * @method  producer_container
	 * @return  Eloquent Relationship
	 */
	public function producer_container()
	{
		return $this->belongsTo('App\Models\Container', 'producer_container_id', 'id');
	}

	/**
	 * fetch the ambassador who is ambassadoring for this consumer ambassador
	 *
	 * @method  consumer_of_ambassador
	 * @return  Eloquent Relationship
	 */
	public function consumer_of_ambassador()
	{
		return $this->belongsTo('App\Models\Ambassador', 'consumer_of_ambassador_id', 'id');
	}

	/**
	 * fetch the Cloudinit AmbassadorTypeNetwork model if it exists
	 *
	 * @method  consumer_of_ambassador
	 * @return  Eloquent Relationship
	 */
	public function ambassador_type_network()
	{
		return $this->hasOne('App\Models\AmbassadorTypeNetwork', 'ambassador_id', 'id');
	}

	/**
	 * get the ambassadors who consume through this ambassador
	 *
	 * @return  collection  the envs
	 */
	public function consumers()
	{
		return $this->hasMany('App\Models\Ambassador', 'consumer_of_ambassador_id', 'id');
	}
}
