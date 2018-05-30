<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{   
    protected $primaryKey = 'Message_ID';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

