@extends('admin.layout.base')

@section('title')
    ویرایش محصول
@endsection
@section('content')
    @component('components.admin.form.form',['method'=>'post','pic_upload'=>true,'action'=>route('admin.product.update',['id'=>$product['id']])])
        @slot('content')
            <input type="hidden" value="{{$product['id']}}" name="id">
            @include('components.admin.form.module.seo',['variable_Seo'=>$product])
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$product["title"]])@endcomponent
            @component('components.admin.form.select2',['name'=>'brand_id','options'=>$brands,'label'=>'برند','choose'=>true,'value'=>$product["brand_id"]])@endcomponent
            @component('components.admin.form.select',['title'=>'وضعیت','id'=>'is_active','name'=>'is_active','array'=>__('common.state'),'value'=>$product["is_active"]])@endcomponent
            @php $tags_product=$product->product_tag()->pluck('id')->toArray(); @endphp
            @component('components.admin.form.related_news',['title'=>'تگ ها','related_arr'=>$tags_product,'id'=>'tag_ids','name'=>'tag_ids','items'=>$tags])@endcomponent
            @component('components.admin.form.related_news',['title'=>'محصولات مرتبط','related_arr'=>$product_related_checked,'id'=>'products_related','name'=>'products_related','items'=>$products_related])@endcomponent

            @component('components.admin.form.upload_file',['title'=>'انتخاب تصویر اصلی','id'=>'pic','name'=>'pic','value'=>$product['primary_image']])@endcomponent

            @component('components.admin.form.textarea',['title'=>'توضیحات','value'=>$product['description'],'id'=>'description','name'=>'description'])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot

    @endcomponent

@endsection


@section('script')
    <script>
        $(document).ready(function () {
            $('#brand_id').select2();
            $('#tag_ids').select2();
            $('#products_related').select2();
            $('.meta_keywords').tagsinput();
            $("#pic").on('change',function (){
                $("[data-value='pic']").remove()
            })
        })
    </script>
@endsection
