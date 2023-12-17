@extends('site.layout.auth_layout')
@section('head')
    <title>بازیابی رمز عبور</title>
@endsection
@section('content')
    <section class="h-screen px-4 flex items-center">
        <div class="container mx-auto max-w-screen-lg">
            <div class="bg-white rounded-2xl overflow-hidden">
                <div class="flex flex-col md:flex-row gap-8">
                    <div class="flex-1 p-8 md:p-4 lg:p-20 lg:pb-0">
                        @if($errors->any())
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li style="color: red">{{$error}}</li>
                                @endforeach
                            </ul>
                        @endif
                        <form action="{{route('password.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="mobile"
                                   value="{{request()->route()->parameter('mobile')}}">
                            <h2 class="text-3xl font-YekanBakh-ExtraBlack my-4">بازیابی رمز عبور</h2>
                            <label class="label">
                                <span class="label-text-alt">کد تایید:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full my-2" name="otpcode" />
                            <label class="label">
                                <span class="label-text-alt"> رمز عبور:</span>
                            </label>
                            <input type="password" class="input input-bordered w-full my-2" name="password" />
                            <label class="label">
                                <span class="label-text-alt">تکرار رمز عبور:</span>
                            </label>
                            <input type="password" class="input input-bordered w-full my-2" name="password_confirmation" />
                            <button class="btn bg-stone-800 hover:bg-stone-900 text-white w-full my-4">بازیابی رمز عبور</button>
                        </form>

                    </div>
                    <div class="hidden md:block">
                        <img class="bg-cover" src="{{asset('site/assets/images/login.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
