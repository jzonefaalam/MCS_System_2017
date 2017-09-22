<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class purchaseordertbl extends Model
{
  protected $table = 'purchaseorder_tbl';
  protected $primaryKey = 'poID';
  protected $fillable = array('poItemName','poDescription', 'poSupplier', 'poSupplierAddress', 'poDate', 'poQty', 'poPrice', 'poTypeId', 'poStatus');
  public $timestamps = false;
}
