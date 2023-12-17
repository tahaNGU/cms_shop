<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('site/node_modules/swiper/swiper-bundle.min.css')}}">
    <link rel="stylesheet" href="{{asset('site/build/style.css')}}">
    <title>404</title>

</head>
<body class="font-YekanBakh-Regular text-sm bg-slate-50">


<section class="h-screen px-4 flex items-center">
    <div class="container mx-auto max-w-screen-sm text-center leading-10">
        <img class="w-3/4 mb-16 mx-auto" src="{{asset('site/assets/images/404.png')}}" alt="">
        <p class="text-3xl font-YekanBakh-ExtraBlack mb-4">صفحه مورد نظر یافت نشد!!</p>
        <a class="bg-yellow-500 py-2 px-6 rounded-xl" href="{{route('main')}}">برو به صفحه اصلی</a>
    </div>
</section>

</body>
</html>
