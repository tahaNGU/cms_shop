@extends('admin.layout.base')

@section('title')
    تگ جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.tag.store')])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection


