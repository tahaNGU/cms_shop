@extends('admin.layout.base')

@section('title')
    لیست دسته بندی ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($product_cats[0]))
                <form action="{{route('admin.category.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th style="width: 341px">تعداد محصول</th>
                                    <th>ترتیب</th>
                                    <th>زیرسته</th>
                                    <th>وضعیت</th>
                                    <th style="width: 450px">وضعیت در صفحه اصلی</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($product_cats as $product_cat)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$product_cat["id"]}}"></th>
                                        <th style="width: 227px">{{$product_cat["title"]}}</th>
                                        <th><a href="{{route('admin.product.list',['cat_id'=>$product_cat['id']])}}">{{$product_cat->product()->count()}}</a></th>
                                        <td style="width:150px" class="d-flex justify-content-center"><input type="text"
                                                                                                             style="width: 20%"
                                                                                                             name="order[{{$product_cat["id"]}}]"
                                                                                                             value="{{$product_cat['order']}}"/>
                                        </td>
                                        <td><a href="{{route('admin.category.list',['parent_id'=>$product_cat["id"]])}}">{{$product_cat->sub_cats()->count()}}</a></td>
                                        <td style="width:230px">{{__('common.state')[$product_cat['state']]}}</td>
                                        <td style="width:230px">{{__('common.state')[$product_cat['state_main']]}}</td>
                                        <td style="width: 227px">{{$product_cat->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.category.edit',['id'=>$product_cat["id"]])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.category.delete',['id'=>$product_cat["id"]])}}"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" type="submit" value="change_state"
                                    name="action_type">تغییر وضعیت
                            </button>
                            <button class="btn btn-primary btn-sm" type="submit" value="change_state_main"
                                    name="action_type">تغییر وضعیت در صفحه اصلی
                            </button>
                            <button class="btn btn-danger btn-sm" value="delete_all" name="action_type">حذف کلی</button>
                            <button class="btn btn-primary btn-sm" value="change_order" name="action_type">تغییر ترتیب
                            </button>
                        </div>

                    </div>
                </form>
            @else
                <div class="alert alert-danger">@lang('alert_msg.error_empty')</div>
            @endif
        </div>
    </div>
@endsection
