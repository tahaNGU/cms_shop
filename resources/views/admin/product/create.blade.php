@extends('admin.layout.base')

@section('title')
    محصول جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.product.store'),'pic_upload'=>true])
        @slot('content')
            @include('components.admin.form.module.seo')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.select2',['name'=>'brand_id','options'=>$brands,'label'=>'برند','choose'=>true,'value'=>old('brand_id')])@endcomponent
            @component('components.admin.form.select',['title'=>'وضعیت','id'=>'is_active','name'=>'is_active','array'=>__('common.state')])@endcomponent
            @component('components.admin.form.related_news',['title'=>'تگ ها','id'=>'tag_ids','name'=>'tag_ids','items'=>$tags])@endcomponent
            @component('components.admin.form.textarea',['title'=>'توضیحات','value'=>old('description'),'id'=>'description','name'=>'description'])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'انتخاب تصویر اصلی','id'=>'pic','name'=>'pic'])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$product_cats,'label'=>'دسته بندی','choose'=>true, 'sub_method'=>'sub_cats','value'=>old('parent_id')])@endcomponent
            <div class="col-12" style="margin: 3% 0">
                <div class="row" id="attributes">

                </div>
            </div>

            <div id="czContainer">
                <div id="first">
                    <div class="recordset">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="">نام</label>
                                <input type="text" name="variation_values[value][]" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">قیمت</label>
                                <input type="text" name="variation_values[price][]" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">تخفیف</label>
                                <input type="text" name="variation_values[discount][]" class="form-control">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="">تعداد</label>
                                <input type="text" name="variation_values[quantity][]" class="form-control">
                            </div>

                            <div class="form-group col-md-3">
                                <label for="">شناسه انبار</label>
                                <input type="text" name="variation_values[sku][]" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            @component('components.admin.form.input',['title'=>'هزینه ارسال','name'=>'delivery_amount','value'=>old('delivery_amount')])@endcomponent
            @component('components.admin.form.input',['title'=>'هزینه ارسال ارسال به ازای هر محصول','name'=>'delivery_amount_pre_product','value'=>old('delivery_amount_pre_product')])@endcomponent

            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection



@section('script')
    <script>
        $(document).ready(function () {
            $('#brand_id').select2();
            $('#tag_ids').select2();
            $('.meta_keywords').tagsinput();
        })
        $("[name='parent_id']").change(function () {

            $.ajax({
                url: "{{route('admin.product.attribute_category')}}",
                method: "get",
                data: {id: $(this).val()},
                success: function (result) {
                    $("#attributes").html('')

                    result.attributes.forEach(attribute => {
                        let attributeGroup = $("<div/>",{
                            class:"form-group col-md-3"
                        })
                        attributeGroup.append($("<label/>",{
                            for:attribute.title,
                            text:attribute.title
                        }))
                        attributeGroup.append($("<input/>",{
                            type:"text",
                            class:"form-control",
                            name:`attribute_ids[${attribute.id}]`,
                            id:"name"
                        }))
                        $("#attributes").append(attributeGroup)
                    })
                },
                error: function () {
                    $("#attributes").html('')
                }
            })
        })



    </script>


    <script type="text/javascript">
        //One-to-many relationship plugin by Yasir O. Atabani. Copyrights Reserved.
        $("#czContainer").czMore();
    </script>
@endsection
