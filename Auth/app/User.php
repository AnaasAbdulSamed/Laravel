<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','project_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';

    protected $primarykey = 'id';


    public function getStatusTextAttribute(){
        if($this->status ==1) return "Active";
        else return "Inactive";
    }


     
// has many relation

    // public function products(){
    //     return $this->hasMany(Product::class);
    // }

    // has one relation

    // public function address()
    // {
    //     return $this->hasOne(Address::class) ;
    // }

    // public function addresses()
    // {
    //     return $this->hasOneThrough(UserAddress::class, Product::class);
    // }
// hasManyThrough*******************

    // public function addresses()
    // {
    //     return $this->hasMany(Address::class);
    // }
// ****************************************
    
       public function address()
        {
            return $this->hasOne(Address::class);
        }
    
        public function products()
        {
            return $this->hasMany(Product::class);
        } 

        public function orders()
        {
            return $this->hasMany(Order::class);
        }

        public function order()
        {
            return $this->hasOneThrough(Order::class, Product::class); 
        }
        public function project()
        {
            return $this->belongsTo(Project::class);
        }

        public function tasks()
        {
            return $this->hasMany(Task::class);
        }





}
