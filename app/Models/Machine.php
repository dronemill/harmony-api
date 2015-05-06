<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use DroneMill\FoundationApi\Auth\Permission as AuthPermission;
use DroneMill\FoundationApi\Database\Model;

class Machine extends Model {

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
	protected $table = 'machine';

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
	 * Define which attributes are fillable
	 */
	protected $fillable = ['name', 'hostname', 'ip'];


    /**
     * The resource type. If null, when the model is rendered,
     * the table name will be used
     *
     * @var  null|string
     */
    protected $resourceType = 'machines';

	/**
	* Handle Model Boot
	*/
	public static function boot()
	{
		Log::debug('Booting Machine model');

		parent::boot();

		static::creating(function($machine)
		{
			if (empty($machine->id))
			{
				Log::debug('Creating machine without id');
				// FIXME: duplicate check
				$machine->id = IntegerHelper::rand64();
				Log::info('Generated machine id', ['machine_id' => $machine->id]);
			}
		});
	}


	/**
	 * fetch the containers that this machine has
	 *
	 * @method  containers
	 * @return  Eloquent Relationship
	 */
	public function containers()
	{
		return $this->hasMany('App\Models\Container', 'machine_id', 'id');
	}
}
