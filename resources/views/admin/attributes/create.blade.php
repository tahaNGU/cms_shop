@extends('admin.layout.base')

@section('title')ایجاد ویژگی@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.attribute.store'),'method'=>'post','pic_upload'=>true])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title'])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
