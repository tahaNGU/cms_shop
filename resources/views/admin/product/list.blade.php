@extends('admin.layout.base')

@section('title')
    لیست محصولات
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($products[0]))
                <form action="{{route('admin.product.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>

                                    <th>عنوان</th>
                                    <th>نام کارشناس</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت در پرفروش ترین ها</th>
                                    <th>نظرات</th>
                                    <th>دسته بندی</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $product)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$product["id"]}}"></th>
                                        <th>{{$product["title"]}}</th>
                                        <td style="width:150px">{{$product->admin->name . " ".$product->admin->lastname}}</td>
                                        <td style="width:150px">{{__('common.state')[$product['is_active']]}}</td>
                                        <td style="width:150px">{{__('common.state')[$product['state_sell']]}}</td>
                                        <td style="width:150px">1</td>
                                        <td>{{$product->product_cat["title"]}}</td>
                                        <td style="width:150px">{{$product->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.product.edit',['id'=>$product["id"]])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('admin.product.product_cat_update',['id'=>$product["id"]])}}"
                                               class="btn btn-sm btn-secondary">تغییر دسته بندی</a>

                                            <a class="btn btn-sm btn-danger"
                                               href=""><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit" value="change_state" name="action_type">
                            تغییر وضعیت
                        </button>
                        <button class="btn btn-danger btn-sm" value="delete_all" name="action_type">حذف کلی</button>
                        <button class="btn btn-primary btn-sm" value="change_order" name="action_type">تغییر ترتیب
                        </button>
                        <button class="btn btn-primary btn-sm" type="submit" value="change_state_sell"
                                name="action_type">تغییر وضعیت در پرفروش ترین ها
                        </button>
                    </div>
                </form>
            @else
                <div class="alert alert-danger">@lang('alert_msg.error_empty')</div>
            @endif
        </div>
    </div>
@endsection
