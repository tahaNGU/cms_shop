@extends('admin.layout.base')

@section('title')ویرایش سوال@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.faq.update',['id'=>$faq["id"]]),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'سوال','id'=>'question','name'=>'question','value'=>$faq['question']])@endcomponent
            @component('components.admin.form.textarea',['title'=>'جواب','id'=>'answer','name'=>'answer','value'=>$faq['answer']])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
