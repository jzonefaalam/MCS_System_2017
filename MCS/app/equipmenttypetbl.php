<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class equipmenttypetbl extends Model
{
    protected $table = 'equipmenttype_tbl';
	protected $primaryKey = 'equipmentTypeID';
	protected $fillable = array('equipmentTypeName', 'equipmentTypeStatus');
	public $timestamps = false;
}
