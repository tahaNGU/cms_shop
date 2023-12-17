@extends('admin.layout.base')

@section('title')سوال جدید@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.faq.store'),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'سوال','id'=>'question','name'=>'question','value'=>old('question')])@endcomponent
            @component('components.admin.form.textarea',['title'=>'جواب','id'=>'answer','name'=>'answer','value'=>old('answer')])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
