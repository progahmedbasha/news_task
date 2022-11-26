<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App;
use DB;
class Storage extends Model
{
    protected $guarded =['id'];
    use HasFactory;
}
