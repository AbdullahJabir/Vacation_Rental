<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LatestBlog extends Model
{
     protected $fillable = [
                    'title',
     				'description',
     				'admin',
     				'like',
     				'status',
     				'image'
    ];
}
