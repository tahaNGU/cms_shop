@extends('admin.layout.base')

@section('title')ویرایش بنر@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.banner.update',['id'=>$banner["id"]]),'method'=>'post','pic_upload'=>true])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>$banner["title"]])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'تصویر','id'=>'pic','name'=>'pic','value'=>$banner["pic"]])@endcomponent
            @component('components.admin.form.select',['title'=>'مکان','id'=>'place','name'=>'place','array'=>$banner_types])@endcomponent
            @component('components.admin.form.select',['title'=>'نوع باز شدن','id'=>'kind_open','name'=>'kind_open','array'=>$kind_open])@endcomponent
            @component('components.admin.form.input',['title'=>'آدرس','id'=>'address','name'=>'address','value'=>$banner["namespace"]])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot
    @endcomponent
@endsection


@section('script')

    <script>
        $(document).ready(function () {
            $("[name='place']").val("{{$banner["type_location"]}}")
            $("[name='kind_open']").val("{{$banner["type_open"]}}")
            $("#pic").on('change',function (){
                $("[data-value='pic']").remove()
            })
        })
    </script>

@endsection
