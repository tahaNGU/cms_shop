@extends('site.layout.base')

@section('content')
    <section class="px-4 my-16">
        <div class="container mx-auto max-w-screen-xl">
            <div class="flex gap-4">
                <div class="w-96  hidden lg:block ">
                    <div class="bg-white rounded-3xl overflow-hidden pb-4">
                        @include('site.layout.user_panel')
                    </div>
                </div>

                <div class="px-4 w-full">

                    <div class="flex flex-col items-center mb-8 lg:hidden">
                        <div class="bg-stone-800 h-24 rounded-3xl w-full p-8">
                            <div class="text-white flex justify-between">
                                <div class="z-30 lg:hidden">
                                    <div class="lg:hidden leading-none z-10">
                                        <div class="drawer">
                                            <input id="my-drawer-5" type="checkbox" class="drawer-toggle" />
                                            <div class="drawer-content">
                                                <label for="my-drawer-5" class="swap swap-rotate drawer-button">

                                                    <!-- this hidden checkbox controls the state -->
                                                    <input type="checkbox" />

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-white swap-off fill-current">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                                                    </svg>

                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 stroke-black swap-on fill-current">
                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>

                                                </label>
                                            </div>
                                            <div class="drawer-side">
                                                <label for="my-drawer-5" class="drawer-overlay"></label>
                                                <ul class="menu p-4 w-80 h-full bg-base-200 text-base-content">

                                                    <div>

                                                        <div class="h-24 bg-stone-800 relative rounded-xl">
                                                            <div class="text-center absolute right-[6.3rem]">
                                                                <div class="avatar online mt-8">
                                                                    <div class="w-24 rounded-full">
                                                                        <img src="/site/assets/images/avatar-3.jpg" />
                                                                    </div>
                                                                </div>

                                                                <h1 class="text-sm font-YekanBakh-Bold mt-4">سهیلا حیدری کیا</h1>
                                                            </div>
                                                        </div>

                                                        <nav class="mt-24">
                                                            <a href="{{route('panel')}}" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zM3.75 15.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zM13.5 15.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z" />
                                                                </svg>
                                                                <span class="mr-1">پیشخوان</span>
                                                            </a>
                                                            <a href="order.html" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">

                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />
                                                                </svg>
                                                                <span class="mr-1">سفارش ها</span>
                                                            </a>
                                                            <a href="interest-list.html" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />
                                                                </svg>

                                                                <span class="mr-1">لیست علاقه مندی</span>
                                                            </a>
                                                            <a href="download.html" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m.75 12l3 3m0 0l3-3m-3 3v-6m-1.5-9H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                                </svg>

                                                                <span class="mr-1">دانلود ها</span>
                                                            </a>

                                                            <a href="edit-account.html" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                                </svg>

                                                                <span class="mr-1">جزئیات حساب کاربری</span>
                                                            </a>
                                                            <a href="index.html" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
                                                                </svg>

                                                                <span class="mr-1">خروج</span>
                                                            </a>

                                                        </nav>
                                                    </div>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <a href="/">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-white">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
                                        </svg>

                                    </a>

                                </div>
                            </div>
                        </div>
                        <div class="avatar online -mt-14">
                            <div class="w-24 rounded-full">
                                <img src="/site/assets/images/avatar-3.jpg" />
                            </div>
                        </div>
                        <h1 class="text-sm font-YekanBakh-Bold mt-4">سهیلا حیدری کیا</h1>
                    </div>


                    <div class="bg-white rounded-3xl p-4">
                        <div class="p-3 bg-stone-200 rounded-xl my-4">
                            <h1 class="text-sm font-YekanBakh-Bold">جزئیات حساب کاربری</h1>
                        </div>
                        @if($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                            <li style="color: red">{{$error}}</li>
                            @endforeach
                        </ul>
                        @endif
                        @if(session()->has('success'))
                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="background: green" role="alert">
                                <span class="block sm:inline" style="color: #fff">{{session()->get('success')}}</span>
                            </div>
                        @endif
                        <form action="{{route('user_complete_information')}}" method="post">
                           @csrf
                             <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <label class="label">
                                    <span class="label-text-alt">نام:</span>
                                </label>
                                <input type="text" class="input input-bordered w-full rounded-xl" value="{{\Illuminate\Support\Facades\Auth::user()->name}}" name="name" />
                            </div>
                            <div>
                                <label class="label">
                                    <span class="label-text-alt">نام خانوادگی:</span>
                                </label>
                                <input type="text" value="{{\Illuminate\Support\Facades\Auth::user()->lastname}}" class="input input-bordered w-full rounded-xl" name="lastname"/>
                            </div>
                            <div>
                                <label class="label">
                                    <span class="label-text-alt">نام نمایشی:</span>
                                </label>
                                <input type="text"   class="input input-bordered w-full rounded-xl" name="panel_name" value="{{\Illuminate\Support\Facades\Auth::user()->panel_name}}" />
                            </div>
                            <div>
                                <label class="label">
                                    <span class="label-text-alt">آدرس ایمیل:</span>
                                </label>
                                <input type="email"  class="input input-bordered w-full rounded-xl" name="email" value="{{\Illuminate\Support\Facades\Auth::user()->email}}" />
                            </div>

                            <div>
                                <label class="label">
                                    <span class="label-text-alt">آدرس سایت:</span>
                                </label>
                                <input type="text" class="input input-bordered w-full rounded-xl"   name="address_site" value="{{\Illuminate\Support\Facades\Auth::user()->address_site}}" />
                            </div>
                            <br>

                            <button class="btn bg-stone-800 w-36 hover:bg-stone-900 text-white my-3" type="submit">ذخیره تغییرات</button>
                        </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
