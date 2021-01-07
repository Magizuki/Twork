<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class usergroup extends Model
{
    protected $table = 'usergroup';
    public $timestamps = false;
    
    public function Member(){
        return $this->hasOne(User::class,'id','userId');
    }
    public function Group(){
        return $this->hasOne(group::class,'id','groupId');
    }
}
