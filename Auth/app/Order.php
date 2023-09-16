<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    
    public function getStatusTextAttribute(){
        if($this->status ==1) return "Placed";
        else return "Deliverd";
    }

    protected $appends =['status_text'];




    public function user()
    {
        return $this->belongsTo(User::class) ;
    }

}
