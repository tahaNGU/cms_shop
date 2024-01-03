<footer class="p-10 bg-stone-800 text-white">
    <div class="container mx-auto max-w-screen-xl">
        <div class="bg-yellow-500 p-8 rounded-3xl mb-10">
            <div class="swiper partners">
                @if(isset($brands[0]))
                <div class="swiper-wrapper">
                    @foreach($brands as $brand)
                    <div class="swiper-slide">
                        <div class="flex justify-center">
                            <img src="{{asset('/images/'.$brand['pic'])}}" alt="">
                        </div>
                    </div>
                    @endforeach

                </div>
                @endif
            </div>
        </div>
        <div class="grid grid-cols-12 gap-4 leading-8">
            <div class="col-span-12 lg:col-span-5">
                <img class="mb-4" src="{{asset('site/assets/images/logo.png')}}" alt="">
                @if(isset($page['long_note']))
                {!!$page['long_note']!!}
                @endif
            </div>
            @if(isset($footer[0]))
                @foreach($footer as $item)
                    <div class="col-span-12 lg:col-span-2 text-right md:text-center">
                        <h3 class="font-YekanBakh-Bold text-white mb-4 text-lg">{{$item['title']}}</h3>
                        @if(isset($item->sub_cats))
                        <ul>
                            @foreach($item->sub_cats as $menu)
                            <li><a href="{{$menu['link']}}" @if($menu['kind_open'] == '2')target="_blank" @endif>{{$menu['title']}}</a></li>
                            @endforeach
                        </ul>
                            @endif
                    </div>
            @endforeach
            @endif
        </div>
    </div>
</footer>
