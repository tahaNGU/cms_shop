@extends('admin.layout.base')

@section('title')
    دسته بندی مقاله جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.article_cat.store')])
        @slot('content')
            @include('components.admin.form.module.seo')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title'])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$news_cats,'label'=>'دسته بندی','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>old('parent_id')])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('.meta_keywords').tagsinput();
            $("#search_code").live('change', function(){
                alert(this.value)
            });
        })
    </script>
@endsection
