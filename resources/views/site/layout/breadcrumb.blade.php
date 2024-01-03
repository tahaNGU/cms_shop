@if(isset($product_cat->parent_product_cat))
    @include('site.layout.breadcrumb',['product_cat'=>$product_cat->parent_product_cat])
    <li><a href="{{route('product',['product_cat'=>$product_cat->parent_product_cat['url_seo']])}}">{{$product_cat->parent_product_cat->title}}</a></li>
@endif
