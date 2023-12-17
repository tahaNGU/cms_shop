@extends('admin.layout.base')

@section('title')
    منو جدید
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.menu.store'),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.input',['title'=>'آدرس','id'=>'address','name'=>'address','value'=>old('address')])@endcomponent
            @component('components.admin.form.select',['title'=>'مکان','id'=>'menu_type','name'=>'menu_type','array'=>$menu_type,'value'=>old('menu_type')])@endcomponent
            @component('components.admin.form.select',['title'=>'نوع باز شدن','id'=>'kind_open','name'=>'kind_open','array'=>$kind_open,'value'=>old('kind_open')])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$menu,'label'=>'منو','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>old('parent_id')])@endcomponent
            @component('components.admin.form.select',['title'=>'وضعیت','id'=>'state','name'=>'state','array'=>$states,'value'=>old('state')])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
