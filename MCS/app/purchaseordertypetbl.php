<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaseordertypetbl extends Model
{
  protected $table = 'purchaseordertype_tbl';
  protected $primaryKey = 'poTypeId';
  protected $fillable = array('poTypeName','poTypeStatus');
  public $timestamps = false;
}
