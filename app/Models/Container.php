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
	 * ResponseDocument references
	 *
	 * @var  Array
	 */
	public $jsonView = [
		'type' => 'container',
		'attributes' => [
			'id' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'host' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_MODEL,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_ALL_ALLOW, AuthPermission::PERMISSION_USER_DENY, ],
					'modify' => [],
				],
			],
			'name' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'cid' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
				],
			],
			'restart' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'hostname' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'image' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'entry_point' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'enabled' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'bool',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_volumes' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_envs' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_nics' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_dns' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_exposes' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_links' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'container_publishs' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_COLLECTION,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'ambassador' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_MODEL,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
			'producer_container' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_MODEL,
				'lazyLoad' => true,
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW],
					'modify' => [],
				],
			],
		],
	];

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
	 * Scope Where hostId
	 *
	 * @method  scopeWhereHostId
	 * @param   string      $hostId
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereHost($query, $hostId)
	{
		return $query->where('host_id', '=', $hostId);
	}

	/**
	 * fetch the host that this container belongs on
	 *
	 * @method  host
	 * @return  Eloquent Relationship
	 */
	// public function host()
	// {
	// 	return $this->belongsTo('App\Models\Host', 'host_id', 'id');
	// }

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
