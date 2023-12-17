@extends('admin.layout.base')

@section('title')
    مدیر جدید
@endsection

@section('content')
    @component('components.admin.form.form',['method'=>'post','action'=>route('admin.manager.store'),'pic_upload'=>true])
        @slot('content')
            @component('components.admin.form.input',['title'=>'نام','name'=>'name','value'=>old('name')])@endcomponent
            @component('components.admin.form.input',['title'=>'نام و نام خانوادگی','name'=>'lastname','value'=>old('lastname')])@endcomponent
            @component('components.admin.form.date_picker',['title'=>'تاریخ نمایش','id'=>'date_birth','name'=>'date_birth','value'=>old('date_birth')])@endcomponent
            @component('components.admin.form.input',['title'=>'ایمیل','name'=>'email','value'=>old('email')])@endcomponent
            @component('components.admin.form.input',['title'=>'موبایل','name'=>'mobile','value'=>old('mobile')])@endcomponent
            @component('components.admin.form.select2',['name'=>'group_access_type','options'=>$group_access_type,'label'=>'سطح دسترسی','choose'=>true,'value'=>old('group_access_type')])@endcomponent

            @component('components.admin.form.input',['title'=>'نام کاربری','name'=>'user_name','value'=>old('user_name')])@endcomponent
            @component('components.admin.form.input',['title'=>'رمز عبور','name'=>'password','type'=>'password'])@endcomponent
            @component('components.admin.form.button')@endcomponent

        @endslot

    @endcomponent
@endsection


@section('script')
    <script>
        $("#date_birth").datepicker({
            dateFormat: "dd/mm/yy",
            showOtherMonths: true,
            selectOtherMonths: false
        });
    </script>

@endsection
