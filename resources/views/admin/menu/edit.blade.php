@extends('admin.layout.base')

@section('title')
    ویرایش منو
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.menu.update',['id'=>$menu['id']]),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>$menu['title']])@endcomponent
            @component('components.admin.form.input',['title'=>'آدرس','id'=>'address','name'=>'address','value'=>$menu['address']])@endcomponent
            @component('components.admin.form.select',['title'=>'مکان','id'=>'menu_type','name'=>'menu_type','array'=>$menu_type,'value'=>$menu['menu_type']])@endcomponent
            @component('components.admin.form.select',['title'=>'نوع باز شدن','id'=>'kind_open','name'=>'kind_open','array'=>$kind_open,'value'=>$menu['kind_open']])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$menus,'label'=>'منو','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>$menu['parent_id']])@endcomponent
            @component('components.admin.form.select',['title'=>'وضعیت','id'=>'state','name'=>'state','array'=>$states,'value'=>$menu['state']])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
