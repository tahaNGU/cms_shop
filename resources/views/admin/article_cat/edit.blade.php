@extends('admin.layout.base')

@section('title')
    دسته بندی مقاله ویرایش
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.article_cat.update',['id'=>$article["id"]])])
        @slot('content')
            <input type="hidden" name="id" value="{{$article["id"]}}">
            @include('components.admin.form.module.seo',['variable_Seo'=>$article])
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$article["title"]])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$news_cats,'label'=>'دسته بندی','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>old('parent_id')])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('.meta_keywords').tagsinput();
            $("option[value='{{$article["id"]}}']").remove()
        })
    </script>
@endsection
