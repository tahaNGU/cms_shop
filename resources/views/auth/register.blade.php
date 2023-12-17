@extends('site.layout.auth_layout')
@section('head')
    <title>ثبت نام</title>
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
                        <form action="{{route('register.store')}}" method="post">
                            @csrf
                            <h2 class="text-3xl font-YekanBakh-ExtraBlack my-4">ثبت نام</h2>
                            <input type="hidden">
                            <label class="label">
                                <span class="label-text-alt">نام :</span>
                            </label>
                            <input type="text" class="input input-bordered w-full my-2" name="name"
                                   value="{{old('name')}}"/>
                            <label class="label">
                                <span class="label-text-alt"> نام خانوادگی:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full my-2" name="lastname"
                                   value="{{old('lastname')}}"/>
                            <label class="label">
                                <span class="label-text-alt">موبایل:</span>
                            </label>
                            <input type="text" name="mobile" value="{{old('mobile')}}" class="input input-bordered w-full my-2"/>
                            <label class="label">
                                <span class="label-text-alt">پسورد:</span>
                            </label>
                            <input type="password" name="password" class="input input-bordered w-full my-2"/>
                            <button class="btn bg-stone-800 hover:bg-stone-900 text-white w-full my-4" type="submit">ثبت
                                نام
                            </button>
                        </form>
                        <p class="text-center my-4">قبلا ثبت نام کرده اید؟ <a href="{{asset('login')}}">وارد شوید</a>
                        </p>
                    </div>
                    <div class="hidden md:block">
                        <img class="bg-cover" src="{{asset('site/assets/images/sign-up.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
