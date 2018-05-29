<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $primaryKey = 'Reservation_ID';

    public function scopeAvailroom($query, $start, $end)
    {
        $query = 'a';
    }
}
