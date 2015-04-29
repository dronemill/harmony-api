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
