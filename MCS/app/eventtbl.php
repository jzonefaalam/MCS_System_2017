<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class eventtbl extends Model
{
    protected $table = 'event_tbl';
	protected $primaryKey = 'eventID';
	protected $fillable = array('eventName', 'eventDate', 'eventTime', 'eventLocation', 'guestCount', 'eventStatus', 'customerID', 'locationID', 'eventTypeID');
	public $timestamps = false;
}
