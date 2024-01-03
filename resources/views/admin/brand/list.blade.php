@extends('admin.layout.base')

@section('title')
    لیست برند ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($brands[0]))
                <form action="{{route('admin.brand.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th>ترتیب</th>
                                    <th>وضعیت</th>
                                    <th>وضعیت در فوتر</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($brands as $brand)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$brand["id"]}}"></th>
                                        <td style="width:230px">{{$brand["title"]}}</td>
                                        <td style="width:150px" class="d-flex justify-content-center"><input type="text" style="width: 20%" name="order[{{$brand["id"]}}]"
                                                                                                             value="{{$brand['order']}}"/></td>
                                        <td style="width:230px">{{__('common.state')[$brand['state']]}}</td>
                                        <td style="width:230px">{{__('common.state')[$brand['state_footer']]}}</td>
                                        <td style="width:150px">{{$brand->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.brand.edit',['id'=>$brand["id"]])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.brand.delete',['id'=>$brand["id"]])}}"><i
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
                            <button class="btn btn-primary btn-sm" type="submit" value="change_state_footer"
                                    name="action_type">تغییر وضعیت در فوتر
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
