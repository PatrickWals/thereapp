<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $primaryKey = 'Room_ID';


    public function scopeRoomstatus($query,$status){
        return $query->whereRoom_status($status);
    }
}
