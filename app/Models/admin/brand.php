<?php

namespace App\Models\admin;

use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class brand extends Model
{
    use HasFactory,convert_Verta;

    protected $guarded=[];
}
