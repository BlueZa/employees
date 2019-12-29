<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['id','name','dob','position'];
    public $timestamps = false;

    public static function inAll(){
        return static::all();
    } 
}
