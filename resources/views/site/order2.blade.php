@extends('site.layout.base')

@section('content')
    <section class="my-14 mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/">خانه</a></li>
                        <li>جزئیات پرداخت</li>
                    </ul>
                </div>
            </div>
            <div class="bg-white rounded-3xl p-4">
                @if(session()->has('success'))
                    <div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded relative" style="background: green" role="alert">
                        <span class="block sm:inline" style="color: #fff">{{session()->get('success')}}</span>
                    </div>
                @endif
                @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li style="color: red">{{$error}}</li>
                        @endforeach
                    </ul>
                @endif
                <form action="{{route('user_info_update')}}" method="post">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">نام:</span>
                            </label>
                            <input type="text" name="name" class="input input-bordered w-full"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->name}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">نام خانوادگی:</span>
                            </label>
                            <input type="text" name="lastname" class="input input-bordered w-full"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->lastname}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">نام شرکت (اختیاری):</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="company_name"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->company_name}}"/>

                        </div>

                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">استان:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="province"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->province}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">شهر:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="city"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->city}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">کدپستی:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="post_code"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->post_code}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">تلفن:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="tell"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->tell}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">ایمیل:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="email"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->email}}"/>

                        </div>
                        <div class="form-control w-full">
                            <label class="label">
                                <span class="label-text-alt">شماره تماس اضطراری:</span>
                            </label>
                            <input type="text" class="input input-bordered w-full" name="tell_emergency"
                                   value="{{\Illuminate\Support\Facades\Auth::user()->tell_emergency}}"/>

                        </div>
                    </div>

                    <button class="btn bg-stone-800 hover:bg-stone-900 text-white mt-4" type="submit">ثبت سفرش و
                        پرداخت
                    </button>
                </form>
            </div>

        </div>

    </section>

@endsection
