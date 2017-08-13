<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_tbl extends Model
{
  protected $table = 'customer_tbl';
  protected $primaryKey = 'customerID';
  protected $fillable = array('fullName', 'customerAge', 'homeAddress','billingAddress', 'emailAddress', 'telNum', 'cellNum', 'customerStatus', 'customerAvail');
  public $timestamps = false;
}
