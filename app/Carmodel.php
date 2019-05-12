<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carmodel extends Model
{
    protected $fillable=['model_name','manufacturer_id','color','year','registration_number','image1','image2'];
}
