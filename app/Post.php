<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
     use SoftDeletes;
     protected $fillable = [
          'title','featured','content','catagory_id'
     ];

     protected $dates = ['deleted_at'];

    public function Catagory()
       {
            return $this->belongsTo('App\Catagory');
       }

}
