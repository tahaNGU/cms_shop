@extends('site.layout.base')

@section('content')
    <section class="my-14 mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/">خانه</a></li>
                        <li>سبد خرید</li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">

                <div class="col-span-12 md:col-span-9">
                    @if(session()->has('success'))
                        <div class="bg-green-100 border border-green-400 text-white-700 px-4 py-3 rounded relative" style="background: green" role="alert">
                            <span class="block sm:inline" style="color: #fff">خرید شما با موفقیت انجام شد</span>
                        </div>
                    @endif
                @if(!\Cart::isEmpty())
                    @foreach($cart_product as $key_product => $product)
                        @php $product_cart=$product['associatedModel'] @endphp
                    <div class="bg-white rounded-3xl p-4 flex flex-col md:flex-row items-center justify-center mb-4 gap-16">
                        <div>
                            <img class="w-32 border rounded-2xl" src="{{asset('images/'.$product_cart['primary_image'])}}" alt="">
                        </div>
                        <div class="leading-10">
                            <h1 class="font-YekanBakh-ExtraBold text-base">{{$product_cart['title']}}</h1>
                            <p>دسته بندی: {{$product_cart->product_cat->title}}</p>

                        </div>
                        @php $product_variation=$product_cart->product_variation()->first() @endphp

                        <div class="flex gap-4 text-base mt-4">
                            @if($product_variation['discount'] > 0)
                                <span class="line-through">{{$product_variation['price']}} تومان</span>
                            @endif
                            <span
                                class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                        </div>
                        <div>
                            <div class="number flex">
                                <span class="minus p-4">تعداد:</span>
                                <input type="text" value="1" disabled class="input input-bordered text-center w-20" />

                            </div>
                            <a href="{{route('remove_cart',['id'=>$key_product])}}" class="btn-danger">حذف</a>
                        </div>
                    </div>
                    @endforeach
                    @else
                            @if(!session()->has('success'))

                            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="background: #dc5858" role="alert">
                            <span class="block sm:inline" style="color: #fff">نتیجه ای یافت نشد</span>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="col-span-12 md:col-span-3">
                    @if(!\Cart::isEmpty())
                    <div class="bg-white rounded-3xl p-8">
                        <div class="flex flex-col font-YekanBakh-ExtraBold  text-lg">
                            <div class="flex items-center justify-between p-4 bg-yellow-100 rounded-lg">
                                <span>تعداد خرید:</span>
                                <span>{{count(Cart::getContent())}} عدد</span>
                            </div>
                            <div class="flex items-center justify-between p-4">
                                <span>مبلغ کل:</span>
                                <span>{{number_format($total_price)}} تومان</span>
                            </div>

                            <a href="{{route('finishBasket')}}" class="btn bg-stone-800 hover:bg-stone-900 text-white">پرداخت</a>
                        </div>

                    </div>
                    @endif
                </div>

            </div>
        </div>

    </section>

@endsection
