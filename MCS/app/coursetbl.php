<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetbl extends Model
{
    protected $table = 'dish_tbl';
	protected $primaryKey = 'dishID';
	protected $fillable = array('dishName', 'dishDescription','dishCost','dishTypeID','dishAvailability','dishStatus','dishImage');
	public $timestamps = false;
}
