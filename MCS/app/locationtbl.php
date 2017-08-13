<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class locationtbl extends Model
{
    protected $table = 'location_tbl';
	protected $primaryKey = 'locationID';
	protected $fillable = array('locationName', 'locationContactPerson', 'locationContactNumber', 'locationDescription', 'locationFee', 'locationAddress', 'locationAvailability', 'locationStatus', 'locationImage');
	public $timestamps = false;
}

