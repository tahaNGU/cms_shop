@extends('site.layout.base')

@section('content')
    <section class="my-14 mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a>خانه</a></li>
                        <li><a>دسته بندی</a></li>
                        <li>فروشگاه</li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-3 order-2 lg:order-1">
                    <div class="bg-white rounded-3xl mb-4 p-4">
                        <h3 class="font-YekanBakh-ExtraBold text-base">فیلتر بر اساس قیمت:</h3>
                        <div class="my-4">
                            <input type="range" min="0" max="100" value="40" class="range range-warning" />
                        </div>
                        <span>قیمت تا 143000 هزار تومان</span>

                    </div>
                    <div class="bg-white rounded-3xl mb-4 p-4">
                        <h3 class="font-YekanBakh-ExtraBold text-base">دسته های محصولات:</h3>
                        <div class="my-4">
                            <ul class="menu">
                                <li><a>دسته بندی اول</a></li>
                                <li>
                                    <details open>
                                        <summary>دسته بندی دوم</summary>
                                        <ul>
                                            <li><a>زیر منوی 1 دسته بندی دوم</a></li>
                                            <li><a>زیر منوی 2 دسته بندی دوم</a></li>
                                            <li>
                                                <details open>
                                                    <summary>دسته بندی سوم</summary>
                                                    <ul>
                                                        <li><a>زیر منوی 1 دسته بندی سوم</a></li>
                                                        <li><a>زیر منوی 2 دسته بندی سوم</a></li>
                                                    </ul>
                                                </details>
                                            </li>
                                        </ul>
                                    </details>
                                </li>
                                <li><a>دسته بندی چهارم</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="bg-white rounded-3xl p-4">
                        <h3 class="font-YekanBakh-ExtraBold text-base">فیلتر براساس برند:</h3>
                        <div class="flex flex-col mt-4 gap-4">
                            <div class="flex items-center justify-between">
                                <span>رونیکس</span>
                                <input type="radio" name="radio-6" class="radio radio-warning" checked />
                            </div>
                            <div class="flex items-center justify-between">
                                <span>دیوالت</span>
                                <input type="radio" name="radio-6" class="radio radio-warning" checked />
                            </div>
                            <div class="flex items-center justify-between">
                                <span>ماکیتا</span>
                                <input type="radio" name="radio-6" class="radio radio-warning" checked />
                            </div>
                            <div class="flex items-center justify-between">
                                <span>توسن</span>
                                <input type="radio" name="radio-6" class="radio radio-warning" checked />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-span-12 lg:col-span-9 order-1 lg:order-2">

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <div class="bg-white rounded-3xl leading-10 p-4">
                            <a href="single-product.html" class="flex flex-col items-center justify-center">
                                <img class="mb-4" src="/site/assets/images/product-5.jpg" alt="">
                            </a>
                            <div class="text-center">
                                <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">کیف کمری ابزار</h3></a>
                                <div class="flex justify-center gap-4 text-base mt-4">
                                    <span class="line-through">360.000 تومان</span>
                                    <span class="text-yellow-500">280.000 تومان</span>
                                </div>
                                <div class="flex justify-center gap-2 items-center mt-4">
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="comparison.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-3xl leading-10 p-4">
                            <div class="relative">
                                <a href="single-product.html" class="flex flex-col items-center justify-center">
                                    <img class="mb-4" src="/site/assets/images/product-8.jpg" alt="">
                                </a>
                                <div class="absolute top-2 left-2 flex gap-1">
                                    <div class="w-4 h-4 rounded-full bg-red-500"></div>
                                    <div class="w-4 h-4 rounded-full bg-yellow-500"></div>
                                </div>
                            </div>
                            <div class="text-center">
                                <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">دلر شارژی مدل دیوالت</h3></a>
                                <div class="flex justify-center gap-4 text-base mt-4">
                                    <span class="line-through">140.000 تومان</span>
                                    <span class="text-yellow-500">90.000 تومان</span>
                                </div>
                                <div class="flex justify-center gap-2 items-center mt-4">
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="comparison.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-3xl leading-10 p-4">
                            <a href="single-product.html" class="flex flex-col items-center justify-center">
                                <img class="mb-4" src="/site/assets/images/product-4.jpg" alt="">
                            </a>
                            <div class="text-center">
                                <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">دستگاه مدل Ingco</h3></a>
                                <div class="flex justify-center gap-4 text-base mt-4">
                                    <span class="line-through">960.000 تومان</span>
                                    <span class="text-yellow-500">425.000 تومان</span>
                                </div>
                                <div class="flex justify-center gap-2 items-center mt-4">
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="comparison.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-3xl leading-10 p-4">
                            <a href="single-product.html" class="flex flex-col items-center justify-center">
                                <img class="mb-4" src="/site/assets/images/product-1.jpg" alt="">
                            </a>
                            <div class="text-center">
                                <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">دریل برقی مدل X</h3></a>
                                <div class="flex justify-center gap-4 text-base mt-4">
                                    <span class="line-through">50.000 تومان</span>
                                    <span class="text-yellow-500">45.000 تومان</span>
                                </div>
                                <div class="flex justify-center gap-2 items-center mt-4">
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="comparison.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="bg-white rounded-3xl leading-10 p-4">
                            <a href="single-product.html" class="flex flex-col items-center justify-center">
                                <img class="mb-4" src="/site/assets/images/product-3.jpg" alt="">
                            </a>
                            <div class="text-center">
                                <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">دستگاه پمپ باد</h3></a>
                                <div class="flex justify-center gap-4 text-base mt-4">
                                    <span class="line-through">50.000 تومان</span>
                                    <span class="text-yellow-500">45.000 تومان</span>
                                </div>
                                <div class="flex justify-center gap-2 items-center mt-4">
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                                        </svg>
                                    </a>
                                    <a class="bg-yellow-500 p-2 text-white rounded-lg" href="comparison.html">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3" />
                                        </svg>

                                    </a>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="flex justify-center mt-10">
                        <div class="join">
                            <button class="join-item btn">«</button>
                            <button class="join-item btn">صفحه 22</button>
                            <button class="join-item btn">»</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection
