@extends('admin.layout.auth.admin')

@section('content')
    <div class="card overflow-hidden">
        <div class="bg-login text-center">
            <div class="bg-login-overlay"></div>
            <div class="position-relative">
                <h5 class="text-white font-size-20">خوش آمدید!</h5>
                <p class="text-white-50 mb-0">جهت دسترسی به پنل مدیریت وارد شوید</p>
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
                @component('components.admin.auth.form.form',['method'=>'post','action'=>route('admin.login')])
                    @slot('content')
                        @csrf
                        @component('components.admin.auth.form.input',['label'=>'نام کاربری','place_holder'=>'لطفا نام کاربری خود را وارد کنید','name'=>'user_name'])@endcomponent

                        @component('components.admin.auth.form.input',['label'=>'رمز عبور','place_holder'=>'لطفا رمز عبور خود را وارد کنید','name'=>'password','type'=>'password'])@endcomponent


                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="customControlInline" name="remember">
                                <label class="custom-control-label" for="customControlInline">به خاطر سپاری</label>
                            </div>

                            <div class="mt-3">
                                <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">ورود</button>
                            </div>

                            <div class="mt-4 text-center">
                                <a href="javascript:void(0)" class="text-muted"><i class="mdi mdi-lock mr-1"></i> رمز عبور خود را فراموش کرده اید؟</a>
                            </div>
                        @endslot
                    @endcomponent
            </div>

        </div>
    </div>
@endsection
