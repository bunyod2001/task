<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];


    public function setNameAttribute($value){
        $this->attributes['name'] = strtoupper($value);
    }

    public function staff(){
        return $this->hasMany(Staff::class);

    }
}
