<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetypetbl extends Model
{
    protected $table = 'dishtype_tbl';
	protected $primaryKey = 'dishTypeID';
	protected $fillable = array('dishTypeName', 'dishTypeStatus','dishTypeImage');
	public $timestamps = false;
}
