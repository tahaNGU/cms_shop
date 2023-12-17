@extends('admin.layout.base')

@section('title')
   ویرایش برند
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.brand.update',['id'=>$brand["id"]])])
        @slot('content')
            <input type="hidden" name="id" value="{{$brand["id"]}}">
            @include('components.admin.form.module.seo',['variable_Seo'=>$brand])
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$brand["title"]])@endcomponent
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
