<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class historytext extends Model
{
    protected $table = 'historytext';
    public $timestamps = false;

    public function user(){
        return $this->hasOne(User::class,'id','userId');
    }
}
