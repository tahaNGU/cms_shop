<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faq extends Model
{
    use HasFactory,convert_Verta,admin_convert;

    protected $guarded=[];

    public function scopeQuestion(Builder $query,$value)
    {
        return $query->where('question', 'like', '%' .$value. '%');
    }
}
