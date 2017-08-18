<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmentlogtbl extends Model
{
    protected $table = 'equipmentlog_tbl';
	protected $primaryKey = 'equipmentLogID';
	protected $fillable = array('equipmentID', 'equipmentQuantityIn', 'equipmentQuantityOut', 'equipmentLogDate');
	public $timestamps = false;
}
