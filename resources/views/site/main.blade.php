@extends('site.layout.base')

@section('content')


    @if(isset($banners[0]))

        <section class="px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="swiper main-slider">
                    <div class="swiper-wrapper">
                        @foreach($banners as $banner)
                            @if(isset($banner["pic"]))

                                <a class="swiper-slide">
                                    <img class="object-cover image_width_main rounded-b-3xl w-full"
                                         src="{{asset($banner["pic_site"])}}" alt="{{$banner["title"]}}">
                                </a>
                            @endif
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </section>
    @endif

    @if(isset($product_cat[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">دسته بندی محصولات</h2>
                </div>
                <div class="swiper cat-slider">
                    <div class="swiper-wrapper">
                        @foreach($product_cat as $category)
                            <div class="swiper-slide">
                                <div class="border border-slate-200 bg-white rounded-3xl leading-10">
                                    <a href="{{route('product',['product_cat'=>$category['url_seo']])}}" class="flex flex-col items-center justify-center p-4">
                                        <img class="w-16 mb-4" src="{{asset('images/'.$category["icon"])}}" alt="">
                                        <h3 class="font-YekanBakh-ExtraBold text-base">{{$category["title"]}}</h3>
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </section>
    @endif

    @if(isset($product_sell[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">پرفروش ترین کالاها</h2>
                </div>
                <div class="swiper slider-product2">
                    <div class="swiper-wrapper">
                        @foreach($product_sell as $product)
                            <div class="swiper-slide">
                                <div class="bg-white rounded-3xl leading-10 relative p-4">
                                    <div class="flex items-center justify-center">
                                        <div>
                                            <a href="{{route('product_page',['product'=>$product['url_seo']])}}"> <img class="w-32"
                                                                               src="{{asset('images/'.$product['primary_image'])}}"
                                                                               alt=""></a>
                                        </div>
                                        @php $product_variation=$product->product_variation()->first() @endphp
                                        <div>
                                            <a href="{{route('product_page',['product'=>$product['url_seo']])}}"><h3
                                                    class="font-YekanBakh-ExtraBold text-base">{{$product["title"]}}</h3>
                                            </a>
                                            <div class="flex justify-center gap-4 text-base mt-4">
                                                @if($product_variation['discount'] > 0)
                                                    <span class="line-through">{{$product_variation['price']}} تومان</span>
                                                @endif
                                                <span class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    <section class="my-14 px-4">
        <a class="container mx-auto max-w-screen-xl">
            @if(isset($banners_under_sell_product['pic']))
                <img class="rounded-2xl" src="{{asset('images/'.$banners_under_sell_product['pic'])}}" alt="">
            @endif
        </a>
    </section>
    @if(isset($product_new[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">جدیدترین محصولات</h2>
                </div>
                <div class="swiper slider-product1">
                    <div class="swiper-wrapper">
                        @foreach($product_new as $product)
                            <div class="swiper-slide">
                                <div class="bg-white rounded-3xl leading-10 p-4">
                                    <a href="{{route('product_page',['product'=>$product['url_seo']])}}" class="flex flex-col items-center justify-center">
                                        <img class="mb-4" src="{{asset('images/'.$product['primary_image'])}}" alt="">
                                    </a>
                                    <div class="text-center">
                                        <a href="{{route('product_page',['product'=>$product['url_seo']])}}"><h3
                                                class="font-YekanBakh-ExtraBold text-base">{{$product["title"]}}
                                                بزار</h3></a>
                                        <div class="flex justify-center gap-4 text-base mt-4">
                                            @php $product_variation=$product->product_variation()->first() @endphp
                                            @if($product_variation['discount'] > 0)
                                                <span class="line-through">{{$product_variation['price']}} تومان</span>
                                            @endif
                                            <span class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                                        </div>
                                        <div class="flex justify-center gap-2 items-center mt-4">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    @if(isset($banners_under_new_product[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($banners_under_new_product as $banner)
                        <div>
                            <img class="rounded-3xl" src="{{asset('images/'.$banner['pic'])}}" alt="">
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
    @if(isset($product_suggest[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">پیشنهاد های ترازو</h2>
                </div>
                <div class="swiper slider-product1">
                    <div class="swiper-wrapper">
                        @foreach($product_suggest as $product)
                            <div class="swiper-slide">
                                <div class="bg-white rounded-3xl leading-10 p-4">
                                    <a href="{{route('product_page',['product'=>$product['url_seo']])}}" class="flex flex-col items-center justify-center">
                                        <img class="mb-4" src="{{asset('images/'.$product['primary_image'])}}" alt="">
                                    </a>
                                    <div class="text-center">
                                        <a href="{{route('product_page',['product'=>$product['url_seo']])}}"><h3
                                                class="font-YekanBakh-ExtraBold text-base">{{$product["title"]}}
                                                بزار</h3></a>
                                        <div class="flex justify-center gap-4 text-base mt-4">
                                            @php $product_variation=$product->product_variation()->first() @endphp
                                            @if(isset($product_variation))
                                                @if($product_variation['discount'] > 0)
                                                                                        <span class="line-through">{{$product_variation['price']}} تومان</span>
                                                @endif
                                                <span class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                                            @endif
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
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </section>
    @endif

    @if(isset($articles[0]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">خواندنی های جدید</h2>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach($articles as $article)
                        <div class="bg-white p-4 rounded-3xl">
                            <div class="relative">
                                <a href="{{route('news_info',['article'=>$article['url_seo']])}}"><img class="rounded-2xl"
                                                                src="{{asset('site/assets/images/blog-1.jpg')}}" alt=""></a>
                                <div
                                    class="absolute top-4 left-4 bg-white border-t-4 border-yellow-400 p-2 px-3 rounded-xl">
                                    <div class="flex flex-col">
                                 <span
                                     class="font-YekanBakh-ExtraBold text-2xl">{{$article->article_day()}}</span>
                                        <span class="font-YekanBakh-Bold">{{$article->article_month()}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="flex justify-between items-center mt-4">
                                <div>
                                    <a href="{{route('news_info',['article'=>$article['url_seo']])}}"><h3
                                            class="font-YekanBakh-ExtraBold text-base">{{$article["title"]}}</h3></a>
                                </div>
                                <div>
                                    <a class="flex items-center" href="{{route('news_info',['article'=>$article['url_seo']])}}">
                                        <span class="ml-2">بیشتر</span>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                             stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                  d="M19.5 12h-15m0 0l6.75 6.75M4.5 12l6.75-6.75"/>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif


@endsection
