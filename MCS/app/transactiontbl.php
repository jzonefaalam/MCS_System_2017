<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class transactiontbl extends Model
{
    protected $table = 'transaction_tbl';
	protected $primaryKey = 'transactionID';
	protected $fillable = array('transactionStatus', 'totalFee', 'reservationID');
	public $timestamps = false;
}
