<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class grouphistory extends Model
{
    protected $table = 'grouphistory';
    public $timestamps = false;
    
    public function historytext(){
        return $this->hasMany(historytext::class,'historyId','id');
    }
    

}
