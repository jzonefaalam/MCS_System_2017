<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class paymenttbl extends Model
{
    protected $table = 'payment_tbl';
	protected $primaryKey = 'paymentID';
	protected $fillable = array('paymentDueDate', 'paymentReceiveDate', 'paymentAmount', 'paymentStatus', 'reservationID');
	public $timestamps = false;
}
