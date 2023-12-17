@extends('site.layout.base')
@section('head')

    <title>وبلاگ</title>
@endsection

@section('content')
    <section class="mb-20 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl my-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a>خانه</a></li>
                        <li><a>دسته بندی</a></li>
                        <li>جزئیات وبلاگ</li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 md:col-span-9 order-1">
                    <div class="bg-white p-4 rounded-3xl leading-8">
                        <div class="border-r-4 bg-slate-100 border-yellow-400 mb-4 rounded-2xl p-4">
                            <h1 class="mb-2 text-base font-YekanBakh-Bold">{{!empty($article["h1"]) ? $article["h1"] : $article["title"]}}</h1>
                            <div class="flex items-center gap-4 text-xs">
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                      </svg>
                                        14 تیر 1402
                                </span>
                                <span class="flex items-center gap-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
                                      </svg>
                                      ابزارآلات
                                </span>
                            </div>
                        </div>
                        <img class="rounded-2xl" style="margin: 3% 0" src="{{asset('images/'.$article["pic"])}}" alt="">
                        {!!$article['long_note']!!}
                    </div>
                </div>
                <div class="col-span-12 md:col-span-3 order-2">
                    @if(isset($related_article[0]))
                    <div class="bg-white p-4 rounded-3xl mb-4 leading-8">
                        <div class="border-r-4 bg-slate-100 border-yellow-400 mb-4 rounded-2xl p-4">
                            <h3 class="font-YekanBakh-Bold text-slate-800 text-base">پربازدیدترین ها</h3>
                        </div>
                        @foreach($related_article as $item)
                        <div>
                            <a href="{{route('news_info',['article'=>$item['url_seo']])}}" class="flex items-center my-4">
                                <div class="avatar">
                                    <div class="w-16 rounded-full">
                                        <img src="{{asset('images/'.$item["pic"])}}" />
                                    </div>
                                </div>
                                <div class="mr-2">
                                    <h3 class="font-YekanBakh-Bold text-slate-800 text-sm">{{$article["title"]}}</h3>
                                </div>
                            </a>

                        </div>
                        @endforeach

                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection
