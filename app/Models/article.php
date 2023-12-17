<?php

namespace App\Models;

use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

class article extends Model
{
    use HasFactory,convert_Verta;
    protected $guarded=[];
    protected $appends=['related_article'];

    public function article_cat_id(){
        return $this->belongsTo(article_cat::class,'cat_id');
    }
    public function getRelatedArticleAttribute(){
        return explode(',',$this->popular_article);
    }


    public function article_month(){
        return Jalalian::forge($this->created_at)->format('%B');;
    }

    public function article_day(){
        return Jalalian::forge($this->created_at)->format('%d');
    }
    public function convert_show_time_date(){
        return verta($this->show_time_date)->format('d/m/Y');
    }
}
