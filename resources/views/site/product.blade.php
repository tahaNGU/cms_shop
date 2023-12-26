@extends('site.layout.base')

@section('content')
    <section class="mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a>خانه</a></li>
                        <li><a>دسته بندی</a></li>
                        <li>جزئیات محصول</li>
                    </ul>
                </div>
            </div>
            <div class=" bg-white p-4 rounded-3xl">
                <div class="grid grid-cols-12 gap-4">
                    <div class="col-span-12 md:col-span-4">
                        <div style="--swiper-navigation-color: #fff; --swiper-pagination-color: #fff"
                             class="swiper border pro-main border-b rounded-3xl">
                            <div class="swiper-wrapper">
                                @if(isset($product['primary_image']))
                                    <div class="swiper-slide">
                                        <img class="rounded-xl cursor-pointer"
                                             src="{{asset('images/'.$product['primary_image'])}}"/>
                                    </div>
                                @endif
                                @if(isset($product->content_site()[0]))
                                    @foreach($product->content_site() as $content)
                                        <div class="swiper-slide">
                                            <img class="rounded-xl cursor-pointer"
                                                 src="{{asset('images/'.$content["pic"])}}"/>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <div class="swiper-button-next after:text-sm"></div>
                            <div class="swiper-button-prev after:text-sm"></div>
                        </div>
                        <div thumbsSlider="" class="swiper gall-pro mt-4">
                            <div class="swiper-wrapper">
                                @if(isset($product['primary_image']))
                                <div class="swiper-slide">
                                    <img class="rounded-xl cursor-pointer"
                                         src="{{asset('images/'.$product["primary_image"])}}"/>
                                </div>
                                @endif
                                    @if(isset($product->content_site()[0]))
                                        @foreach($product->content_site() as $content)
                                        <div class="swiper-slide">
                                            <img class="rounded-xl cursor-pointer"
                                                 src="{{asset('images/'.$content["pic"])}}"/>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 md:col-span-8">
                        <div class="p-4">
                            <div class="bg-stone-50 rounded-xl p-4 leading-8">
                                <h1 class="font-YekanBakh-ExtraBold text-base">{{$product['title']}}</h1>
                                <p>دسته بندی: دریل ها</p>
                            </div>
                            <div class="grid grid-cols-12 mt-4">
                                <div class="col-span-12 lg:col-span-8 p-4">
                                    @if(isset($product->product_attribiute[0]))
                                    <ul class="leading-8 text-stone-500">
                                        @foreach($product->product_attribiute as $attribiute)
                                        <li>{{$attribiute->attribute['title']}}: {{$attribiute['value']}}</li>
                                        @endforeach

                                    </ul>
                                    @endif
                                    <div class="flex gap-4 text-base mt-4">
                                    @php $product_variation=$product->product_variation()->first() @endphp

                                    @if($product_variation['discount'] > 0)
                                            <span class="line-through">{{$product_variation['price']}} تومان</span>
                                        @endif
                                        <span
                                            class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                                    </div>
                                    <div>
                                        <select name="" id="" class="select select-bordered search_product"></select>
                                    </div>
                                    <button class="btn bg-stone-800 hover:bg-stone-900 text-white my-6">افزودن به سبد
                                        خرید
                                    </button>
                                </div>
                                <div class="hidden lg:block col-span-4">
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M2.25 8.25h19.5M2.25 9h19.5m-16.5 5.25h6m-6 2.25h3m-3.75 3h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z"/>
                                        </svg>
                                        <span class="mr-2">بهترین قیمت</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.75 5.25a3 3 0 013 3m3 0a6 6 0 01-7.029 5.912c-.563-.097-1.159.026-1.563.43L10.5 17.25H8.25v2.25H6v2.25H2.25v-2.818c0-.597.237-1.17.659-1.591l6.499-6.499c.404-.404.527-1 .43-1.563A6 6 0 1121.75 8.25z"/>
                                        </svg>

                                        <span class="mr-2">تضمین اصل بودن محصول</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M6 12L3.269 3.126A59.768 59.768 0 0121.485 12 59.77 59.77 0 013.27 20.876L5.999 12zm0 0h7.5"/>
                                        </svg>

                                        <span class="mr-2">ارسال سریع</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M10.34 15.84c-.688-.06-1.386-.09-2.09-.09H7.5a4.5 4.5 0 110-9h.75c.704 0 1.402-.03 2.09-.09m0 9.18c.253.962.584 1.892.985 2.783.247.55.06 1.21-.463 1.511l-.657.38c-.551.318-1.26.117-1.527-.461a20.845 20.845 0 01-1.44-4.282m3.102.069a18.03 18.03 0 01-.59-4.59c0-1.586.205-3.124.59-4.59m0 9.18a23.848 23.848 0 018.835 2.535M10.34 6.66a23.847 23.847 0 008.835-2.535m0 0A23.74 23.74 0 0018.795 3m.38 1.125a23.91 23.91 0 011.014 5.395m-1.014 8.855c-.118.38-.245.754-.38 1.125m.38-1.125a23.91 23.91 0 001.014-5.395m0-3.46c.495.413.811 1.035.811 1.73 0 .695-.316 1.317-.811 1.73m0-3.46a24.347 24.347 0 010 3.46"/>
                                        </svg>

                                        <span class="mr-2">مشاوره قبل از خرید</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M21 11.25v8.25a1.5 1.5 0 01-1.5 1.5H5.25a1.5 1.5 0 01-1.5-1.5v-8.25M12 4.875A2.625 2.625 0 109.375 7.5H12m0-2.625V7.5m0-2.625A2.625 2.625 0 1114.625 7.5H12m0 0V21m-8.625-9.75h18c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125h-18c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z"/>
                                        </svg>

                                        <span class="mr-2">بسته بندی زیبا</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z"/>
                                        </svg>

                                        <span class="mr-2">رضایت کاربران</span>
                                    </div>
                                    <div class="flex items-center border rounded-lg my-2 p-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-yellow-500">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M4.5 12.75l6 6 9-13.5"/>
                                        </svg>

                                        <span class="mr-2">تایید فروشنده توسط ترازو</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="my-4 px-4">
        @if(isset($product['description']))
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white rounded-3xl p-8 leading-8">
                <p class="text-3xl font-YekanBakh-ExtraBlack mb-4">توضیحات</p>
                {{$product['description']}}
            </div>
        </div>
        @endif
    </section>

    <section class="my-4 mb-14 px-4">
        @if(isset($related_product[0]))
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white rounded-3xl p-8 leading-8">
                <p class="text-3xl font-YekanBakh-ExtraBlack mb-4">محصولات مشابه</p>
                <div class="swiper related">
                    <div class="swiper-wrapper">
                        @foreach($related_product as $product)
                        <div class="swiper-slide">
                            <div class="bg-white rounded-3xl leading-10 p-4">
                                <a href="{{route('product_page',['product'=>$product['url_seo']])}}" class="flex flex-col items-center justify-center">
                                    <img class="w-32"
                                         src="{{asset('images/'.$product['primary_image'])}}"
                                         alt="{{$product['title']}}">
                                </a>
                                <div class="text-center">
                                    <a href="{{route('product_page',['product'=>$product['url_seo']])}}"><h3 class="font-YekanBakh-ExtraBold text-base">{{$product['title']}}</h3></a>
                                    <div class="flex justify-center gap-4 text-base mt-4">
                                        @if($product_variation['discount'] > 0)
                                            <span class="line-through">{{$product_variation['price']}} تومان</span>
                                        @endif
                                        <span class="text-yellow-500">{{number_format($product_variation['price_final'])}} تومان </span>
                                    </div>
                                    <div class="flex justify-center gap-2 items-center mt-4">
                                        <a class="bg-yellow-500 p-2 text-white rounded-lg" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                            </svg>
                                        </a>
                                        <a class="bg-yellow-500 p-2 text-white rounded-lg" href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3"/>
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>

        </div>
        @endif
    </section>
@endsection
