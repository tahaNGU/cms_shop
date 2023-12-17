@extends('admin.layout.base')

@section('title')
    لیست بنر ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($banners[0]))
            <form action="{{route('admin.banner.action_items')}}" method="post">
                @csrf
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0 text-center">

                            <thead>
                            <tr>
                                <th><input type="checkbox" class="check_all"></th>
                                <th>عنوان</th>
                                <th>نام کارشناس</th>
                                <th>مکان بنر</th>
                                <th style="width: 12rem">نوع باز شدن</th>
                                <th>وضعیت</th>
                                <th>ترتیب</th>
                                <th>تاریخ</th>
                                <th>#</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($banners as $banner)
                                <tr>
                                    <th scope="row"><input type="checkbox" class="check_item" name="check_item[]" value="{{$banner["id"]}}"></th>
                                    <td style="width:230px">{{$banner["title"]}}</td>
                                    <td style="width:150px">{{$banner->admin->name . " ".$banner->admin->lastname}}</td>
                                    <td style="width: px">{{__('common.banner_type')[$banner['type_location']]}}</td>
                                    <td style="width:150px">{{__('common.kind_open')[$banner['type_open']]}}</td>
                                    <td style="width:150px">{{__('common.state')[$banner['state']]}}</td>
                                    <td style="width:150px" class="d-flex justify-content-center"><input type="text" style="width: 20%" name="order[{{$banner["id"]}}]"
                                                                                     value="{{$banner['order']}}"/></td>
                                    <td style="width:150px">{{$banner->convert_Verta()}}</td>
                                    <td style="width:150px" style="width:150px" class="d-flex">
                                        <a href="{{route('admin.banner.edit',['id'=>$banner["id"]])}}" class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{route('admin.banner.delete',['id'=>$banner["id"]])}}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary btn-sm" type="submit" value="change_state" name="action_type">تغییر وضعیت</button>
                        <button class="btn btn-danger btn-sm" value="delete_all" name="action_type">حذف کلی</button>
                        <button class="btn btn-primary btn-sm" value="change_order" name="action_type">تغییر ترتیب</button>
                    </div>

                </div>
            </form>
            @else
                <div class="alert alert-danger">@lang('alert_msg.error_empty')</div>
            @endif
        </div>
    </div>
@endsection
