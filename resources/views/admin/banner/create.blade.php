@extends('admin.layout.base')

@section('title')بنر جدید@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.banner.store'),'method'=>'post','pic_upload'=>true])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title'])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'تصویر','id'=>'pic','name'=>'pic'])@endcomponent
            @component('components.admin.form.select',['title'=>'مکان','id'=>'place','name'=>'place','array'=>$banner_types])@endcomponent
            @component('components.admin.form.select',['title'=>'نوع باز شدن','id'=>'kind_open','name'=>'kind_open','array'=>$kind_open])@endcomponent
            @component('components.admin.form.input',['title'=>'آدرس','id'=>'address','name'=>'address'])@endcomponent

            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
