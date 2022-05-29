<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class Comment extends Model 
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
   
}//end of model
