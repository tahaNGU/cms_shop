@extends('admin.layout.base')

@section('title')
   ویرایش صفحه
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.page.update',['id'=>$page["id"]]),'method'=>'post','pic_upload'=>true])
        @slot('content')
            @include('components.admin.form.module.seo',['variable_Seo'=>$page])
            <input type="hidden" name="id" value="{{$page["id"]}}">
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>$page['title']])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'تصویر','id'=>'pic','name'=>'pic','value'=>$page['pic']])@endcomponent
            @component('components.admin.form.input',['title'=>'alt تصویر','name'=>'alt_pic','value'=>$page['alt_pic']])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'ویدیو','id'=>'video','name'=>'video','value'=>$page['video']])@endcomponent
            @component('components.admin.form.input',['title'=>'آدرس','name'=>'address','value'=>$page['address']])@endcomponent
            @component('components.admin.form.advance_editor',['title'=>'متن بلند','value'=>$page['long_note'],'id'=>'long_note','name'=>'long_note'])@endcomponent
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection

@section('script')
    <script src="{{asset('admin/assets/libs/tinymce/tinymce.min.js')}}"></script>
    <script src="{{asset('admin/assets/libs/tinymce/langs/fa_IR.js')}}"></script>

    <script>
        $(document).ready(function () {
            $('.meta_keywords').tagsinput();

            tinymce.init({
                language: "fa_IR",
                selector: "#long_note",
                height:300,
                plugins: [
                    "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "save table directionality emoticons template paste"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ]
            });
            $("#pic").on('change',function (){
                $("[data-value='pic']").remove()
            })
            $("#video").on('change',function (){
                $("[data-value='video']").remove()
            })


        })

    </script>

@endsection
