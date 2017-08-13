<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class packageinclusiontbl extends Model
{
    protected $table = 'packageinclusion_tbl';
	protected $primaryKey = 'packageInclusionID';
	protected $fillable = array('packageID', 'dishTypeID', 'equipmentID');
	public $timestamps = false;
}

