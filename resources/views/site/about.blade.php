@extends('site.layout.base')
@section('head')

<title>درباره ما </title>
@endsection

@section('content')
    @if(isset($about["title"]))
        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-xl">
                <div class="text-center mb-8">
                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">درباره ما</h2>
                </div>
                <div class="grid grid-cols-12 gap-4 md:gap-8">
                @if(isset($content_about[0]) && !empty($content_about[0]))
                    <div class="col-span-12 md:col-span-3 flex flex-col justify-center">
                        @foreach($content_about[0] as $content)
                        <div class="bg-white border rounded-3xl p-4 flex items-center mb-4 flex-col text-center gap-4">
                            <div class="bg-yellow-500 p-2 rounded-xl" style="width: 4rem">
                                <img src="{{asset('images/'.$content['pic'])}}" alt="">


                            </div>
                            <div>
                                <h3 class="text-base font-YekanBakh-ExtraBold mb-2">{{$content["title"]}}</h3>
                                <p>{{$content["title2"]}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    @endif

                    <div class="col-span-12 md:col-span-6">
                        @if(isset($about["pic"]) && !empty($about["pic"]))
                        <img class="rounded-3xl" src="{{asset('images/'.$about["pic"])}}" alt="">
                        @endif
                    </div>
                    @if(isset($content_about[1]) && !empty($content_about[1]))
                    <div class="col-span-12 md:col-span-3 flex flex-col justify-center">
                        @foreach($content_about[1] as $content)
                        <div class="bg-white border rounded-3xl p-4 flex items-center mb-4 flex-col text-center gap-4">
                            <div class="bg-yellow-500 p-2 rounded-xl" style="width: 4rem">
                                <img src="{{asset('images/'.$content['pic'])}}" alt="">


                            </div>
                            <div>
                                <h3 class="text-base font-YekanBakh-ExtraBold mb-2">{{$content["title"]}}</h3>
                                <p>{{$content["title2"]}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @endif
                </div>
            </div>
        </section>

        <section class="my-14 px-4">
            <div class="container mx-auto max-w-screen-lg">
                <div class="text-center mb-8">

                    <h2 class="font-YekanBakh-ExtraBlack text-3xl">{{$about["title"]}}</h2>
                </div>
                <div class="leading-8">
                    {!!$about["long_note"]!!}
                </div>
            </div>

        </section>
    @else
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative alert_danger">@lang('alert_msg.error_page',['page'=>'about_us'])</div>
    @endif
    @if(isset($content_about_photo) && !empty($content_about_photo))
    <section class="my-14 px-4 py-20 bg-stone-100">
        <div class="container mx-auto max-w-screen-2xl">
            <div class="text-center mb-8">
                <h2 class="font-YekanBakh-ExtraBlack text-3xl">نیروی های ترازو</h2>
            </div>
            <div class="swiper about-slider">
                <div class="swiper-wrapper">
                   @foreach($content_about_photo as $content)
                    <div class="swiper-slide w-72 h-auto">
                        <img src="{{asset('images/'.$content['pic'])}}" alt="{{$content["title"]}}"/>
                    </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    @endif
@endsection
