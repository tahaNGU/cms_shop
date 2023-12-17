@extends('admin.layout.base')

@section('title')
    محتوا جدید
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.content.store',['module'=>$module]),'method'=>'post','pic_upload'=>true])
        @slot('content')
            <input type="hidden" name="module" value="{{$module}}">
            <input type="hidden" name="item_id" value="{{$item_id}}">
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.select',['title'=>'نوع','id'=>'kind','name'=>'kind','array'=>__('common.content_type'),'value'=>old('kind')])@endcomponent
            <div class="d-none kind-3" data-kind="true">
                 @component('components.admin.form.input',['title'=>'عنوان2','name'=>'title2','value'=>old('title2')])@endcomponent
            </div>
            <div class="d-none kind-2 kind-3" data-kind="true">
                @component('components.admin.form.upload_file',['title'=>'تصویر','id'=>'pic','name'=>'pic'])@endcomponent
            </div>
            <div class="photo d-none kind-1" data-kind="true">
                @component('components.admin.form.advance_editor',['title'=>'متن بلند','value'=>old('long_note'),'id'=>'long_note','name'=>'long_note'])@endcomponent
            </div>
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
                height: 300,
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


        })

    </script>
    <script>
        $("[name='kind']").on('change',function (){
            $("[data-kind]").removeClass('d-none')
            $("[data-kind]").removeClass('d-block')
            $("[data-kind]").addClass('d-none')
            if($(this).val() != ''){
                $(".kind-"+$(this).val()).addClass('d-block')
            }
        })
    </script>

@endsection
