<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class group extends Model
{
    protected $table = 'msgroup';
    public $timestamps = false;
    
    public function grouphistory(){
        return $this->hasOne(grouphistory::class,'groupId','id');
    }
    public function groupMember(){
        return $this->hasMany(usergroup::class,'groupId','id');
    }
}
