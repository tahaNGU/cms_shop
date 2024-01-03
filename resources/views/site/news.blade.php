@extends('site.layout.base')
@section('head')

    <title>وبلاگ</title>
@endsection

@section('content')
    <section class="my-14 mt-4 px-4">

        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="{{route('main')}}">خانه</a></li>
                        <li>وبلاگ</li>
                    </ul>
                </div>
            </div>

            @if(isset($article[0]))
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4 mb-8">
                    @foreach($article as $item)
                        @if(isset($item["pic"]))
                            <div class="bg-white p-4 rounded-3xl">
                                <div class="relative">
                                    <a href="{{route('news_info',['article'=>$item['url_seo']])}}"><img class="rounded-2xl"
                                                                                                        src="{{asset('images/'.$item["pic"])}}" alt=""></a>
                                    <div
                                        class="absolute top-4 left-4 bg-white border-t-4 border-yellow-400 p-2 px-3 rounded-xl">
                                        <div class="flex flex-col">
                                            <span
                                                class="font-YekanBakh-ExtraBold text-2xl">{{$item->article_day()}}</span>
                                            <span class="font-YekanBakh-Bold">{{$item->article_month()}}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex justify-between items-center mt-4">
                                    <div>
                                        <a href="{{route('news_info',['article'=>$item['url_seo']])}}"><h3
                                                class="font-YekanBakh-ExtraBold text-base">{{$item["title"]}}</h3></a>
                                    </div>
                                    <div>
                                        <a class="flex items-center" href="{{route('news_info',['article'=>$item['url_seo']])}}">
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
                        @endif
                    @endforeach
                </div>
            @endif


            <div class="flex justify-center mt-10">
                <div class="join">
                    {{$article->withQueryString()->links()}}
                </div>
            </div>

        </div>
    </section>

@endsection
