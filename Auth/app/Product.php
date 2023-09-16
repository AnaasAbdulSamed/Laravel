<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'product_name', 'product_code', 'details', 'logo','brand','user_id'
    ];


    
    protected $table = 'products';

    protected $primarykey = 'id';

    protected $foreginkey = 'user_id';

    // has many
    public function user(){
        return $this->belongsTo(User::class);
    }

    // has through

    // public function users(){
    //     return $this->belongsTo(User::class);
    // }



    
}
