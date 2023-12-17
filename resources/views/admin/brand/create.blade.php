@extends('admin.layout.base')

@section('title')
    برند جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.brand.store')])
        @slot('content')
            @include('components.admin.form.module.seo')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection



@section('script')
    <script>
        $(document).ready(function () {
            $('.meta_keywords').tagsinput();
        })
    </script>

@endsection
