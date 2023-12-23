<?php

namespace App\Models;

use App\trait\admin\convert_Verta;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_cat extends Model
{
    use HasFactory, convert_Verta;

    protected $guarded = [];

    public function sub_cats()
    {
        return $this->hasMany(product_cat::class, 'parent_id');
    }

    public function product()
    {
        return $this->hasMany(product::class, 'category_id');
    }

    public function categories()
    {
        return $this->belongsToMany(attribiute::class, 'attribute_category');
    }
}
