@extends('admin.layout.base')

@section('title')
    دسته بندی جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.category.store'),'pic_upload'=>true])
        @slot('content')
            @include('components.admin.form.module.seo')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$product_cats,'label'=>'دسته بندی','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>old('parent_id')])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'آیکون','id'=>'icon','name'=>'icon'])@endcomponent

            @component('components.admin.form.related_news',['title'=>'ویژگی ها','id'=>'attributes','name'=>'attributes','items'=>$attributes])@endcomponent
            @component('components.admin.form.related_news',['title'=>'انتخاب ویژگی های قابل فیلتر','id'=>'compare','name'=>'compare','items'=>[]])@endcomponent
            @component('components.admin.form.select',['title'=>'انتخاب ویژگی متغیر','id'=>'variation','array'=>[],'name'=>'variation','value'=>old("variation")])@endcomponent
            @component('components.admin.form.textarea',['title'=>'توضیحات','value'=>old('description'),'id'=>'description','name'=>'description'])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection



@section('script')
    <script>
        $(document).ready(function () {
            $('.meta_keywords').tagsinput();
            var attributes =@json($attributes);
            $('#compare').select2();
            $('#attributes').select2();
            $(document.body).on("change", "#attributes", function () {
                var value_attributes = $("#attributes").val();
                $("#variation").empty().trigger('change')

                $("#compare").empty().trigger('change')
                $.each(attributes, function (index, element) {
                    for (attr of value_attributes) {
                        if (attr == element.id) {
                            $("#compare").append("<option value='" + element.id + "'>" + element.title + "</option>");
                        }
                    }

                })
            });
            $(document.body).on("change", "#compare", function () {
                var value_compare = $("#compare").val();
                $("#variation").empty().trigger('change')

                $.each(attributes, function (index, element) {
                    for (compare of value_compare) {
                        if (compare == element.id) {
                            $("#variation").append("<option value='" + element.id + "'>" + element.title + "</option>");
                        }
                    }

                })
            });
        })
    </script>

@endsection
