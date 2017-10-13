<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customertbl extends Model
{
    protected $table = 'customer_tbl';
	protected $primaryKey = 'customerID';
	protected $fillable = array('fullName', 'homeAddress', 'billingAddress', 'emailAddress', 'cellNum', 'telNum', 'dateOfBirth', 'customerAvailability', 'customerStatus');
	public $timestamps = false;
}
