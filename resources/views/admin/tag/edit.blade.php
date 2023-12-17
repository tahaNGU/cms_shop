@extends('admin.layout.base')

@section('title')
    ویرایش تگ
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.tag.update',['id'=>$tag["id"]])])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$tag["title"]])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection


