<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product_attribute extends Model
{
    use HasFactory,SoftDeletes;

    protected $table="product_attribute";
    protected $guarded=[];





}
