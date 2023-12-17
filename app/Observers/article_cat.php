<?php

namespace App\Observers;

class article_cat
{
    public function deleted(\App\Models\article_cat $article_cat): void
    {
        if (\App\Models\article_cat::where('parent_id', $article_cat["id"])->count()) {
            \App\Models\article_cat::where('parent_id', $article_cat["id"])->update(['parent_id'=> '0']);
        }
    }
}
