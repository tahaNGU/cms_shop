@extends('site.layout.base')

@section('content')
    <section class="my-14 mt-4 px-4">
        <div class="container mx-auto max-w-screen-xl">
            <div class="bg-white p-4 rounded-3xl mb-4">
                <div class="text-sm breadcrumbs">
                    <ul>
                        <li><a href="/">خانه</a></li>

                        <li><a @if(isset($product_cat->title))href="{{route('product')}}" @else href="javascript:void(0)" @endif>محصولات</a></li>

                        @include('site.layout.breadcrumb',['product_cat'=>$product_cat])
                        @if(isset($product_cat->title))
                        <li><a href="javascript:void(0)">{{$product_cat->title}}</a></li>
                        @endif
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
                                                    @if(isset($product_cat->sub_cats))
                                                    <ul>
                                                        @foreach($product_cat->sub_cats as $category)
                                                        <li><a href="{{route('product',['product_cat'=>$category['url_seo']])}}">{{$category['title']}}</a></li>

                                                        @endforeach

                                                    </ul>
                                                    @endif
                                                </details>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        @endif

                        @if(isset($product_attribute[0]))
                            @foreach($product_attribute as $attribute)
                                @if(isset($attribute->value[0]))
                                <div class="bg-white rounded-3xl p-4">
                                    <h3 class="font-YekanBakh-ExtraBold text-base">فیلتر براساس {{$attribute['title']}}
                                        :</h3>
                                    <div class="flex flex-col mt-4 gap-4">
                                        @foreach($attribute->value as $value)
                                            <div class="flex items-center justify-between">
                                                <span>{{$value['value']}}</span>
                                                <input type="checkbox"
                                                       value="{{$value['value']}}"
                                                       {{ ( request()->has('attribiute.'.$attribute->id) && in_array( $value->value , explode('-' , request()->attribiute[$attribute->id] ) ) ) ? 'checked' : '' }}
                                                       class="radio radio-warning search_product attribiute-{{$attribute['id']}}"
                                                />
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        @endif
                        @foreach($product_attribute as $attribiute)
                            <input type="hidden" id="filter-attribiute-{{$attribiute['id']}}"
                                   name="attribiute[{{$attribiute->id}}]">
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
                            <option value="default"
                                    @if(request()->has('sortBy')) @if(request()->get('sortBy')=='default') selected @endif @endif>
                                مرتب سازی
                            </option>
                            <option value="max"
                                    @if(request()->has('sortBy')) @if(request()->get('sortBy')=='max') selected @endif @endif>
                                بیشترین قیمت
                            </option>
                            <option value="min"
                                    @if(request()->has('sortBy')) @if(request()->get('sortBy')=='min') selected @endif @endif>
                                کم ترین قیمت
                            </option>
                            <option value="latest"
                                    @if(request()->has('sortBy')) @if(request()->get('sortBy')=='latest') selected @endif @endif>
                                جدید ترین
                            </option>
                            <option value="oldest"
                                    @if(request()->has('sortBy')) @if(request()->get('sortBy')=='oldest') selected @endif @endif>
                                قدیمی ترین
                            </option>
                        </select>

                    </div>
                    @if(isset($products[0]))
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach($products as $product)
                            <div class="bg-white rounded-3xl leading-10 p-4">
                                <a href="{{route('product_page',['product'=>$product['url_seo']])}}"
                                   class="flex flex-col items-center justify-center">
                                    <img class="mb-4" src="{{asset('images/'.$product['primary_image'])}}"
                                         alt="{{$product['title']}}">
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
                    @else
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" style="background: #dc5858;margin-top: 3%;" role="alert">
                            <span class="block sm:inline" style="color: #fff">نتیجه ای یافت نشد</span>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>
@endsection


@section('scripts')
    <script>
        function filter() {
            let attribiutes =@json($product_attribute);
            attribiutes.map(attribiute => {
                let value_attribute = $(`.attribiute-${attribiute.id}:checked`).map(function () {
                    return this.value
                }).get().join("-")
                if (value_attribute == "") {
                    $(`#filter-attribiute-${attribiute.id}`).prop('disabled', true)
                } else {
                    $(`#filter-attribiute-${attribiute.id}`).val(value_attribute)

                }
            })
            let sortBy = $("#sort-by").val()

            if (sortBy == "default") {
                $("#filter-sortBy").prop('disabled', true)
            } else {
                $("#filter-sortBy").val(sortBy)

            }
            $("#form_product").submit()

        }


        $(".search_product").on('change', function () {
            filter()
        })

        $("#form_product").on('submit', function (event) {
            event.preventDefault()
            let current = '{{url()->current()}}';
            let url = current + "?" + decodeURIComponent($(this).serialize())
            $(location).attr('href', url)

        })
    </script>
@endsection
