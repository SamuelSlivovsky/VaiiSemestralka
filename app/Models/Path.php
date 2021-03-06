<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Path
 */
class Path extends Model
{
    use HasFactory;

    protected $fillable = ['user_id','name','difficulty','ascendType','date','tries'];
}
