@extends('admin.layout.base')

@section('title')
    ویرایش دسته بندی
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.category.update',['id'=>$product_cat["id"]]),'pic_upload'=>true])
        @slot('content')
            <input type="hidden" name="id" value="{{$product_cat["id"]}}">
            @include('components.admin.form.module.seo',['variable_Seo'=>$product_cat])
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$product_cat["title"]])@endcomponent
            @component('components.admin.form.select2',['name'=>'parent_id','options'=>$product_cats,'label'=>'دسته بندی','first_option'=>'دسته بندی اصلی', 'sub_method'=>'sub_cats','value'=>$product_cat["id"]])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'آیکون','id'=>'icon','name'=>'icon','value'=>$product_cat["icon"]])@endcomponent
            <div class="form-group mb-0" style="width: 82%;margin-right: 1%">
                <label class="control-label">ویژگی ها</label>
                <select class="select2 form-control select2-multiple" id="attributes" name="attributes[]" multiple
                        data-placeholder="انتخاب کنید ...">

                    @if(isset($attributes[0]))
                        @foreach($attributes as $attribute)
                            <option
                                value="{{$attribute['id']}}" {{(in_array($attribute["id"],$product_cat->categories->pluck('id')->toArray())) ? "selected" : ""}}>{{$attribute['title']}}</option>
                        @endforeach
                    @endif
                </select>

            </div>
            <div class="form-group mb-0" style="width: 82%;margin-right: 1%">
                <label class="control-label">انتخاب ویژگی های قابل فیلتر</label>
                <select class="select2 form-control select2-multiple" id="compare" name="compare[]" multiple
                        data-placeholder="انتخاب کنید ...">
                    @foreach($product_cat->categories()->wherePivot('is_filter',1)->get() as $compare)
                        <option value="{{$compare['id']}}" selected>{{$compare['title']}}</option>

                    @endforeach
                </select>

            </div>
            <div class="form-group">
                <label for="variation" class="col-md-2 col-form-label">انتخاب ویژگی متغیر</label>
                <div class="col-md-10">
                    <select class="form-control" name="variation" id="variation">
                        <option value="">انتخاب کنید</option>

                        <option value="{{$product_cat->categories()->wherePivot('is_filter',1)->first()->id}}"
                                selected>{{$product_cat->categories()->wherePivot('is_filter',1)->first()->title}}</option>
                    </select>
                </div>
            </div>



            @component('components.admin.form.textarea',['title'=>'توضیحات','value'=>$product_cat['description'],'id'=>'description','name'=>'description'])@endcomponent
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
            $("#icon").on('change',function (){
                $("[data-value='icon']").remove()
            })
        })
    </script>

@endsection
