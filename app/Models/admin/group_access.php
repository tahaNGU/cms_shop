<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class group_access extends Model
{
    use HasFactory;
    protected $table="group_access";
    protected $guarded=[];
}
