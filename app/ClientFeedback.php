<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClientFeedback extends Model
{
    protected $fillable = [
                    'client_name',
     				'client_title',
     				'client_description',
     				'status',
     				'image'
    ];
}
