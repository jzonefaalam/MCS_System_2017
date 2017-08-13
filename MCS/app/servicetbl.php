<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetbl extends Model
{
    protected $table = 'service_tbl';
	protected $primaryKey = 'serviceID';
	protected $fillable = array('serviceName', 'serviceDescription', 'serviceFee', 'serviceTypeID', 'serviceStatus', 'serviceAvailability', 'serviceImage');
	public $timestamps = false;
}
