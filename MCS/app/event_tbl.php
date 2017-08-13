<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class event_tbl extends Model
{
  protected $table = 'event_tbl';
  protected $primaryKey = 'eventID';
  protected $fillable = array('eventName', 'eventDate', 'eventTime','eventLocation', 'guestCount', 'eventStatus', 'customerID', 'eventTypeID');
  public $timestamps = false;
}
