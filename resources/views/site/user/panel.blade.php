@extends('site.layout.base')

@section('content')
    <section class="px-4 my-16">
        <div class="container mx-auto max-w-screen-xl">
            <div class="flex gap-4">
                <div class="w-96  hidden lg:block ">
                   @include('site.layout.user_panel')
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

                                                                <h1 class="text-sm font-YekanBakh-Bold mt-4">@if(empty(\Illuminate\Support\Facades\Auth::user()->panel_name)){{\Illuminate\Support\Facades\Auth::user()->name}} {{\Illuminate\Support\Facades\Auth::user()->lastname}}@else {{\Illuminate\Support\Facades\Auth::user()->panel_name}}@endif</h1>
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


                                                            <a href="{{route('user_profile_information')}}" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                                                                </svg>

                                                                <span class="mr-1">جزئیات حساب کاربری</span>
                                                            </a>
                                                            <a href="{{route('logout')}}" class="flex items-center py-4 px-8 hover:bg-stone-100 duration-300">
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
                                    <a href="shop.html">
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

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4 rounded-s-3xl">
                        <div class="flex items-center justify-between bg-yellow-500 rounded-3xl p-8">

                            <div class="leading-8 ml-2 text-white">
                                <p class="text-xl font-YekanBakh-ExtraBold">9 محصول</p>
                                <span class="text-sm mb-2 font-YekanBakh-Bold">خریداری کرده اید</span>
                            </div>
                            <div>
                                <div class="p-4 bg-stone-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                                    </svg>



                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between bg-stone-800 rounded-3xl p-8">

                            <div class="leading-8 ml-2 text-white">
                                <p class="text-xl font-YekanBakh-ExtraBold">2 محصول</p>
                                <span class="text-sm mb-2 font-YekanBakh-Bold">در انتظار پرداخت</span>
                            </div>
                            <div>
                                <div class="p-4 bg-stone-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                                    </svg>



                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-between bg-yellow-500 rounded-3xl p-8">

                            <div class="leading-8 ml-2 text-white">
                                <p class="text-xl font-YekanBakh-ExtraBold">1 محصول</p>
                                <span class="text-sm mb-2 font-YekanBakh-Bold">لغو شده</span>
                            </div>
                            <div>
                                <div class="p-4 bg-stone-100 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                    </svg>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-4">

                        <div class="p-3 bg-stone-200 rounded-xl my-4">
                            <h1 class="text-sm font-YekanBakh-Bold">سفارش های اخیر شما</h1>
                        </div>
                        <div class="flex flex-col gap-4">
                            <div class="p-6 border rounded-2xl relative">
                                <div class="bg-green-500 rounded-tl-2xl text-xs text-white py-3 px-6 rounded-br-2xl absolute top-0 left-0">پرداخت موفق</div>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-6">
                                    <div>
                                        <span>تاریخ:</span>
                                        <span class="mr-1 text-stone-500">3 خرداد 1402</span>
                                    </div>
                                    <div>
                                        <span>کد سفارش:</span>
                                        <span class="mr-1 text-stone-500">#246585</span>
                                    </div>
                                    <div>
                                        <span>تخفیف:</span>
                                        <span class="mr-1 text-stone-500">76.000 تومان</span>
                                    </div>
                                    <div>
                                        <span>جمع سبد خرید:</span>
                                        <span class="mr-1 text-stone-500">399.000 تومان</span>
                                    </div>

                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-center">
                                    <div class="flex mb-6">
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-2.jpg" alt="">
                                        </a>
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-3.jpg" alt="">
                                        </a>
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <button class="px-8 py-2 bg-stone-800 rounded-xl text-white">مشاهده فاکتور</button>
                                    </div>
                                </div>
                            </div>
                            <div class="p-6 border rounded-2xl relative">
                                <div class="bg-green-500 rounded-tl-2xl text-xs text-white py-3 px-6 rounded-br-2xl absolute top-0 left-0">پرداخت موفق</div>
                                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 my-6">
                                    <div>
                                        <span>تاریخ:</span>
                                        <span class="mr-1 text-stone-500">3 خرداد 1402</span>
                                    </div>
                                    <div>
                                        <span>کد سفارش:</span>
                                        <span class="mr-1 text-stone-500">#246585</span>
                                    </div>
                                    <div>
                                        <span>تخفیف:</span>
                                        <span class="mr-1 text-stone-500">76.000 تومان</span>
                                    </div>
                                    <div>
                                        <span>جمع سبد خرید:</span>
                                        <span class="mr-1 text-stone-500">399.000 تومان</span>
                                    </div>

                                </div>
                                <div class="flex flex-col sm:flex-row justify-between items-center">
                                    <div class="flex mb-6">
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-2.jpg" alt="">
                                        </a>
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-3.jpg" alt="">
                                        </a>
                                        <a href="single-product.html">
                                            <img class="w-24" src="/site/assets/images/product-4.jpg" alt="">
                                        </a>
                                    </div>
                                    <div>
                                        <button class="px-8 py-2 bg-stone-800 rounded-xl text-white">مشاهده فاکتور</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
