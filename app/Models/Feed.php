<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Feed extends Model
{
    public $guarded = [];
    protected $table = "news";
    use HasFactory;
 
    public function User()
    {
      return $this->belongsTo('App\Models\User');
    }
        public function scopeWhenSearch($query,$search){
        return $query->when($search,function($q)use($search){
            return $q->where('title','like',"%$search%")
                ->orWhere('content','like',"%$search%");
             
        });
    }
}
