<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicetypetbl extends Model
{
    protected $table = 'servicetype_tbl';
	protected $primaryKey = 'serviceTypeID';
	protected $fillable = array('serviceTypeName', 'serviceTypeDescription', 'serviceTypeStatus', 'serviceTypeAvailability');
	public $timestamps = false;
}
