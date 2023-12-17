<?php

$rules= [
    'module'=>[
        'article_cat'=>'دسته بندی مقاله',
        'article'=>'مقاله',
        'banner'=>'بنر',
        'faq'=>'سوال و جواب',
        'menu'=>'منو',
        'page'=>'صفحات',
    ],
    'crud'=>[
        'create'=>'ایجاد',
        'update'=>'ویرایش',
        'delete'=>'حذف',
        'action_items'=>'عملیات کلی',
    ]
];
$res_rules=[];
foreach ($rules['module'] as $key_module => $value_module) {
    foreach ($rules['crud'] as $key_crud => $value_crud) {
        $res_rules['crud_module']['admin.'.$key_module.'.'.$key_crud]=$value_crud.' '.$value_module;
    }
}
$res_rules['module_title']=$rules['module'];
return $res_rules;
