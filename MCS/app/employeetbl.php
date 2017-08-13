<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class employeetbl extends Model
{
    protected $table = 'employee_tbl';
	protected $primaryKey = 'employeeID';
	protected $fillable = array('employeeName', 'employeeTypeID', 'employeeAvailability', 'employeeStatus','employeeImage');
	public $timestamps = false;
}
