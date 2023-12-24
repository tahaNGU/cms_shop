@extends('admin.layout.base')

@section('title')
    ویرایش دسته بندی محصول
@endsection
@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.product.product_cat_store',['id'=>$product["id"]])])
        @slot('content')
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$product_cats,'label'=>'دسته بندی','choose'=>true, 'sub_method'=>'sub_cats'])@endcomponent
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
            @component('components.admin.form.button')@endcomponent

        @endslot
    @endcomponent
@endsection
@section('script')
    <script>
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
