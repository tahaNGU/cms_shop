@extends('admin.layout.auth.admin')

@section('content')
    <div class="card overflow-hidden">
        <div class="bg-login text-center">
            <div class="bg-login-overlay"></div>
            <div class="position-relative">
                <h5 class="text-white font-size-20">ثبت نام رایگان</h5>
                <p class="text-white-50 mb-0">حساب کاربری رایگان کووکس خود را دریافت کنید</p>
                <a href="javascript:void(0)" class="logo logo-admin mt-4">
                    <img src="{{asset('admin/assets/images/logo-sm-dark.png')}}" alt="" height="30">
                </a>
            </div>
        </div>
        <div class="card-body pt-5">
            <div class="p-2">
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text text-danger">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                @component('components.admin.auth.form.form',['method'=>'post','action'=>route('admin.register')])
                    @slot('content')
                        @csrf
                        @component('components.admin.auth.form.input',['label'=>'نام','place_holder'=>'لطفا نام خود را وارد کنید','name'=>'name'])@endcomponent
                        @component('components.admin.auth.form.input',['label'=>'نام خانوادگی','place_holder'=>'لطفا نام خانوادگی خود را وارد کنید','name'=>'lastname'])@endcomponent

                        @component('components.admin.auth.form.input',['label'=>'نام کاربری','place_holder'=>'لطفا نام کاربری خود را وارد کنید','name'=>'user_name'])@endcomponent
                        @component('components.admin.auth.form.input',['label'=>' رمز عبور','type'=>'password','place_holder'=>'لطفا رمز عبور خود را وارد کنید','name'=>'password'])@endcomponent
                        @component('components.admin.auth.form.input',['label'=>'تایید رمز عبور','type'=>'password','place_holder'=>'لطفا تایید رمز عبور خود را وارد کنید','name'=>'password_confirmation'])@endcomponent



                        <div class="mt-4">
                            <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">ثبت نام
                            </button>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">با ثبت نام شما موافقت می کنید با <a href="#" class="text-primary">قوانین و
                                    مقررات</a></p>
                        </div>
                    @endslot
                @endcomponent
            </div>

        </div>
    </div>
@endsection
