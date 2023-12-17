@extends('site.layout.base')
@section('head')

    <title>سوال و جواب</title>
@endsection

@section('content')
    <section>
        <form action="{{route('faq')}}" method="get">
        <div class="relative flex justify-center items-center">

            <img class="object-cover lg:h-auto h-60" src="site/assets/images/bg-faq.jpg" alt="">
                <div class="form-control w-full max-w-lg absolute p-4 text-center">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl mb-4 text-white">سوال خود را جستجو کنید...</h2>
                    <div class="relative">
                        <input type="text" placeholder="تایپ کنید ..."
                               class="input input-bordered w-full max-w-lg placeholder:text-sm" name="title" value="{{request()->get('title')}}"/>
                        <button class="btn absolute top-0 left-0 rounded-r-none">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                 stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"/>
                            </svg>

                        </button>
                    </div>
                </div>
        </div>
            </form>

    </section>

    <section class="my-14 px-4">
        @if(isset($faqs[0]))
            <div class="container mx-auto max-w-screen-xl">
                @foreach($faqs as $faq)
                    <div class="collapse collapse-plus bg-base-200 my-4">
                        <input type="radio" name="my-accordion-3" checked="checked"/>
                        <div class="collapse-title text-base font-YekanBakh-ExtraBold">
                            {{$faq["question"]}}
                        </div>
                        <div class="collapse-content">
                            <p>{{$faq["answer"]}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="background: #dc5858" role="alert">
                <span class="block sm:inline" style="color: #fff">نتیجه ای یافت نشد</span>
            </div>
        @endif
    </section>
@endsection
