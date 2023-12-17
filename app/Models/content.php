<?php

namespace App\Models;

use App\trait\admin\admin_convert;
use App\trait\admin\convert_date;
use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class content extends Model
{
    use HasFactory,admin_convert,convert_Verta;
    protected $table="contents";
    public $timestamps=false;
    protected $guarded=[];
    public function content()
    {
        return $this->morphTo();
    }

}
