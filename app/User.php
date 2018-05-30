<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'User_ID';

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'Username','Firstname','Lastname', 'Email', 'Password','Phone','Mobile','Futurelab_Str','Profile_Pic','Status_Str','Aboutme_Str'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
 * Get the password for the user.
 *
 * @return string
 */
public function getAuthPassword()
{
    return $this->Password;
}

public function messages()
{
  return $this->hasMany(Message::class);
}
    
}
