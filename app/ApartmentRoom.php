<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApartmentRoom extends Model
{
    protected $fillable = [
     				'room_name',
     				'max_person',
     				'size',
     				'view',
     				'bed',
     				'status',
     				'image'
    ];
}
