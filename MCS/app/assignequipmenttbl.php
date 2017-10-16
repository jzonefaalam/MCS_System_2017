<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class assignequipmenttbl extends Model
{
    protected $table = 'assignequipment_tbl';
	protected $primaryKey = 'assignEquipmentID';
	protected $fillable = array('assignEquipmentQty', 'assignReturnQty', 'assignEquipmentDate','assignEquipmentStatus','equipmentID','reservationID');
	public $timestamps = false;
}
