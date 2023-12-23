@extends('site.layout.base')

@section('content')
<section class="my-14 mt-4 px-4">
    <div class="container mx-auto max-w-screen-xl">
        <div class="bg-white p-4 rounded-3xl mb-4">
            <div class="text-sm breadcrumbs">
                <ul>
                    <li><a>خانه</a></li>
                    <li>مقاسه محصول</li>
                </ul>
            </div>
        </div>
        <div class="bg-white rounded-3xl p-4">
            <div class="flex flex-col w-full md:flex-row">
                <div class="grid flex-grow card p-4 rounded-box place-items-center border">
                    <div class="flex items-center gap-4 border-b mb-4 pb-4">
                        <div>
                            <img class="w-28 rounded-2xl" src="/site/assets//images/product-8.jpg" alt="">
                        </div>
                        <div>
                            <a href="single-product.html"><h3 class="font-YekanBakh-ExtraBold text-base">دلر شارژی مدل دیوالت</h3></a>
                            <div class="flex justify-center gap-4 text-base mt-4">
                                <span class="line-through">140.000 تومان</span>
                                <span class="text-yellow-500">90.000 تومان</span>
                            </div>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra">
                            <tbody>
                            <!-- row 1 -->
                            <tr>
                                <th>تعداد فروش</th>
                                <td>36 عدد</td>
                            </tr>
                            <!-- row 2 -->
                            <tr>
                                <th>مدل:</th>
                                <td>رونیکس</td>
                            </tr>
                            <!-- row 3 -->
                            <tr>
                                <th>رنگ:</th>
                                <td>زرد</td>
                            </tr>
                            <tr>
                                <th>منبع تغذیه:</th>
                                <td>باتری</td>
                            </tr>
                            <tr>
                                <th>مدت زمان شارژ:</th>
                                <td>4 ساعت</td>
                            </tr>
                            <tr>
                                <th>وزن:</th>
                                <td>250 گرم</td>
                            </tr>
                            <tr>
                                <th>اقلام:</th>
                                <td>دفترچه</td>
                            </tr>
                            <tr>
                                <th>ابعاد:</th>
                                <td>60 در 40</td>
                            </tr>
                            <tr>
                                <th>ولتاژ:</th>
                                <td>18 ولت</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="my-8">
                        <a class="bg-yellow-500 py-4 px-6 rounded-xl" href="single-product.html">مشاهده و خرید</a>
                    </div>
                </div>
                <div class="divider lg:divider-horizontal">با</div>
                <div class="grid flex-grow card p-4 rounded-box place-items-center border">

                </div>
                <div class="divider lg:divider-horizontal">با</div>
                <div class="grid flex-grow card p-4 rounded-box place-items-center border">

                </div>
            </div>
        </div>
    </div>
</section>
@endsection
