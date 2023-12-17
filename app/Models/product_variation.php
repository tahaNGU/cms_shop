<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_variation extends Model
{
    use HasFactory,SoftDeletes;

    protected $guarded=[];
    protected $table="product_variation";
}
