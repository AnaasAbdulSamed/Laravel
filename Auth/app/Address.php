<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = "user_addresses" ; 

    protected $guarded = [] ;



    // has one
    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

    // has Through

    // public function users()
    // {
    //     return $this->belongsTo(User::class);
    // }
}
