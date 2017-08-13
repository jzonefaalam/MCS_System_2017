<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeetypetbl extends Model
{
    protected $table = 'employeetype_tbl';
	protected $primaryKey = 'employeeTypeID';
	protected $fillable = array('employeeTypeName', 'employeeTypeDescription', 'employeeRatePerHour', 'employeeTypeStatus','employeeTypeImage');
	public $timestamps = false;
}
