@extends('admin.layout.base')

@section('title')ویرایش ویژگی@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.attribute.update',['id'=>$attribute["id"]]),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>$attribute["title"]])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
