<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use DroneMill\FoundationApi\Auth\Permission as AuthPermission;
use DroneMill\FoundationApi\Database\Model;

class AmbassadorTypeNetwork extends Model {

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
	protected $table = 'ambassador_type_network';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

	public $timestamps = false;

	/**
	 * ResponseDocument references
	 *
	 * @var  Array
	 */
	public $jsonView = [
		'type' => 'ambassador_type_network',
		'attributes' => [
			'id' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
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
			'producer_port' => [ // the port of the producer we are ambassadoring
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'int',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ambassador_host_port' => [ // the the public host port
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'int',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'bool',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl_server_pem' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'string',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl_server_crt' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'string',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl_client_pem' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'string',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl_client_crt' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'string',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
					'modify' => [],
				],
			],
			'ssl_expires' => [
				'type' => self::JSONVIEW_ATTRIBUTE_TYPE_ATTRIBUTE,
				'datatype' => 'string',
				'permission' => [
					'read' => [AuthPermission::PERMISSION_OPS_ALLOW, AuthPermission::PERMISSION_HOST_ALLOW, ],
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
	 * Scope Where Ambassador
	 *
	 * @method  scopeWhereAmbassador
	 * @param   string      $ambassador_id
	 * @return  Illuminate\Database\Query\Builder
	 */
	public function scopeWhereAmbassador($query, $ambassador_id)
	{
		if (! $ambassador_id) return $query;

		return $query->where('ambassador_id', $ambassador_id);
	}

	/**
	 * fetch the ambassador
	 *
	 * @method  ambassador
	 * @return  Eloquent Relationship
	 */
	public function ambassador()
	{
		return $this->belongsTo('App\Models\Ambassador', 'ambassador_id', 'id');
	}
}
