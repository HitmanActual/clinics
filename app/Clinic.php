<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_id','governorate_id','district_id',
        'address','long','lat','type','phone','regular_price','urgent_price',
    ];


}