<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class reservationtbl extends Model
{
    protected $table = 'reservation_tbl';
	protected $primaryKey = 'reservationID';
	protected $fillable = array('reservationStatus', 'eventID', 'paymentModeID', 'paymentTermID', 'packageID');
	public $timestamps = false;
}
