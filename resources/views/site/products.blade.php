@extends('site.layout.base')

@section('content')
    <section class="my-14 mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/">خانه</a></li>

                        <li><a>دسته بندی</a></li>
                        <li>فروشگاه</li>
                    </ul>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12 lg:col-span-3 order-2 lg:order-1">
                    <form id="form_product">
                        @if(isset($product_cats[0]))
                            <div class="bg-white rounded-3xl mb-4 p-4">
                                <h3 class="font-YekanBakh-ExtraBold text-base">دسته های محصولات:</h3>
                                <div class="my-4">
                                    <ul class="menu">
                                        @foreach($product_cats as $product_cat)
                                            <li>
                                                <details open>
                                                    <summary>
                                                        <a href="{{route('product',['product_cat'=>$product_cat['url_seo']])}}">{{$product_cat['title']}}</a>
                                                    </summary>
                                                    <ul style="display: none">
                                                        <li><a>زیر منوی 1 دسته بندی دوم</a></li>
                                                        <li><a>زیر منوی 2 دسته بندی دوم</a></li>
                                                        <li>
                                                            <details open="">
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
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif
                        {{--                        @if(isset($brands[0]))--}}
                        {{--                            <div class="bg-white rounded-3xl p-4">--}}
                        {{--                                <h3 class="font-YekanBakh-ExtraBold text-base">فیلتر براساس برند:</h3>--}}
                        {{--                                <div class="flex flex-col mt-4 gap-4">--}}
                        {{--                                    @foreach($brands as $brand)--}}
                        {{--                                        <div class="flex items-center justify-between">--}}
                        {{--                                            <span>{{$brand['title']}}</span>--}}
                        {{--                                            <input type="checkbox" name="radio-6" value="{{$brand['id']}}"--}}
                        {{--                                                   class="radio radio-warning" checked/>--}}
                        {{--                                        </div>--}}
                        {{--                                    @endforeach--}}
                        {{--                                </div>--}}
                        {{--                            </div>--}}
                        {{--                        @endif--}}

                        @if(isset($product_attribute[0]))
                            @foreach($product_attribute as $attribute)
                                <div class="bg-white rounded-3xl p-4">
                                    <h3 class="font-YekanBakh-ExtraBold text-base">فیلتر براساس {{$attribute['title']}}
                                        :</h3>
                                    <div class="flex flex-col mt-4 gap-4">
                                        @foreach($attribute->value as $value)
                                            <div class="flex items-center justify-between">
                                                <span>{{$value['value']}}</span>
                                                <input type="checkbox"
                                                       value="{{$value['value']}}" {{ ( request()->has('attribiute.'.$attribute->id) && in_array( $value->value , explode('-' , request()->attribiute[$attribute->id] ) ) ) ? 'checked' : '' }}
                                                       class="radio radio-warning search_product attribiute-{{$attribute['id']}}"
                                                />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @foreach($product_attribute as $attribiute)
                                <input type="hidden" id="filter-attribiute-{{$attribiute['id']}}" name="attribiute[{{$attribiute->id}}]">
                        @endforeach
                            <input type="hidden" id="filter-sortBy" name="sortBy">

                    </form>
                </div>
                <div class="col-span-12 lg:col-span-9 order-1 lg:order-2">
                    <div class="form-control w-full">
                        <label class="label">
                            <span class="label-text-alt">مرتب سازی:</span>
                        </label>
                        <select class="select select-bordered search_product" id="sort-by">
                            <option value="default" @if(request()->has('sortBy')) @if(request()->get('sortBy')=='default') selected  @endif @endif>مرتب سازی</option>
                            <option value="max" @if(request()->has('sortBy')) @if(request()->get('sortBy')=='max') selected  @endif @endif>بیشترین قیمت</option>
                            <option value="min" @if(request()->has('sortBy')) @if(request()->get('sortBy')=='min') selected  @endif @endif>کم ترین قیمت</option>
                            <option value="latest" @if(request()->has('sortBy')) @if(request()->get('sortBy')=='latest') selected  @endif @endif>جدید ترین</option>
                            <option value="oldest" @if(request()->has('sortBy')) @if(request()->get('sortBy')=='oldest') selected  @endif @endif>قدیمی ترین</option>
                        </select>

                    </div>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($products as $product)
                            <div class="bg-white rounded-3xl leading-10 p-4">
                                <a href="{{route('product_page',['product'=>$product['url_seo']])}}" class="flex flex-col items-center justify-center">
                                    <img class="mb-4" src="{{asset('images/'.$product['primary_image'])}}" alt="{{$product['title']}}">
                                </a>
                                <div class="text-center">
                                    <a href="{{route('product_page',['product'=>$product['url_seo']])}}"><h3
                                            class="font-YekanBakh-ExtraBold text-base">{{$product['title']}}</h3></a>
                                    @php $product_variation=$product->product_variation()->first() @endphp

                                    <div class="flex justify-center gap-4 text-base mt-4">
                                        @if($product_variation['discount'] > 0)
                                            <span class="line-through">{{$product_variation['price']}} تومان</span>
                                        @endif
                                        <span
                                            class="text-yellow-500">{{number_format($product_variation['price_final'])}}</span>
                                    </div>
                                    <div class="flex justify-center gap-2 items-center mt-4">
                                        <a class="bg-yellow-500 p-2 text-white rounded-lg" href="cart.html">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z"/>
                                            </svg>
                                        </a>
                                        <a class="bg-yellow-500 p-2 text-white rounded-lg"
                                           href="{{route('compare',['product_cat_id'=>$product['id']])}}">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                      d="M19.5 12c0-1.232-.046-2.453-.138-3.662a4.006 4.006 0 00-3.7-3.7 48.678 48.678 0 00-7.324 0 4.006 4.006 0 00-3.7 3.7c-.017.22-.032.441-.046.662M19.5 12l3-3m-3 3l-3-3m-12 3c0 1.232.046 2.453.138 3.662a4.006 4.006 0 003.7 3.7 48.656 48.656 0 007.324 0 4.006 4.006 0 003.7-3.7c.017-.22.032-.441.046-.662M4.5 12l3 3m-3-3l-3 3"/>
                                            </svg>

                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="flex justify-center mt-10">
                        <div class="join">
                            {{$products->withQueryString()->links()}}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection


@section('scripts')
    <script>
            function filter() {
                let attribiutes =@json($product_attribute);
                attribiutes.map(attribiute=>{
                    let value_attribute=$(`.attribiute-${attribiute.id}:checked`).map(function () {
                        return this.value
                    }).get().join("-")
                    if(value_attribute==""){
                        $(`#filter-attribiute-${attribiute.id}`).prop('disabled',true)
                    }
                    else{
                        $(`#filter-attribiute-${attribiute.id}`).val(value_attribute)

                    }
                })
                let sortBy=$("#sort-by").val()

                if(sortBy=="default"){
                    $("#filter-sortBy").prop('disabled',true)
                }
                else{
                    $("#filter-sortBy").val(sortBy)

                }
                $("#form_product").submit()

            }



        $(".search_product").on('change', function () {
            filter()
        })

        $("#form_product").on('submit',function (event){
            event.preventDefault()
            let current='{{url()->current()}}';
            let url=current+"?"+decodeURIComponent($(this).serialize())
            $(location).attr('href',url)

        })
    </script>
@endsection
