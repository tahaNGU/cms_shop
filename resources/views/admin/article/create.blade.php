@extends('admin.layout.base')

@section('title')
    مقاله جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.article.store'),'pic_upload'=>true])
        @slot('content')
            @include('components.admin.form.module.seo')
            @component('components.admin.form.input',['title'=>'عنوان','name'=>'title','value'=>old('title')])@endcomponent
            @component('components.admin.form.date_picker',['title'=>'تاریخ نمایش','id'=>'datepicker','name'=>'show_time_date','value'=>old('show_time_date')])@endcomponent
            @component('components.admin.form.upload_file',['title'=>'تصویر (1024x614)','id'=>'pic','name'=>'pic'])@endcomponent
            @component('components.admin.form.input',['title'=>'alt تصویر','name'=>'alt_pic','value'=>old('alt_pic')])@endcomponent
            @component('components.admin.form.select2',['name'=>'cat_id','options'=>$article_cats,'label'=>'دسته بندی','choose'=>true, 'sub_method'=>'sub_cats','value'=>old('cat_id')])@endcomponent
            @component('components.admin.form.select',['title'=>'وضعیت','id'=>'state','value'=>old('state'),'name'=>'state','array'=>__('common.state')])@endcomponent
            @component('components.admin.form.related_news',['title'=>'مقاله مرتبط','name'=>'popular_article','items'=>$articles])@endcomponent
            @component('components.admin.form.textarea',['title'=>'متن کوتاه','value'=>old('short_note'),'id'=>'short_note','name'=>'short_note'])@endcomponent
            @component('components.admin.form.advance_editor',['title'=>'متن بلند','value'=>old('long_note'),'id'=>'long_note','name'=>'long_note'])@endcomponent
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
            $("#datepicker").datepicker({
                dateFormat: "dd/mm/yy",
                showOtherMonths: true,
                selectOtherMonths: false
            });
            $('#related_article').select2();

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



        })

    </script>

@endsection
