@extends('admin.layout.base')

@section('title')
    لیست منو ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($menu[0]))
                <form action="{{route('admin.menu.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th>نام کارشناس</th>
                                    <th style="width: 12rem">نوع باز شدن</th>
                                    <th>وضعیت</th>
                                    <th>زیر بخش</th>
                                    <th>بخش</th>
                                    <th>ترتیب</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($menu as $item)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$item["id"]}}"></th>
                                        <td style="width:230px">{{$item["title"]}}</td>
                                        <td style="width:150px">{{$item->admin->name . " ".$item->admin->lastname}}</td>
                                        <td style="width:150px">{{__('common.kind_open')[$item['kind_open']]}}</td>
                                        <td style="width:150px">{{__('common.state')[$item['state']]}}</td>
                                        <td style="width:150px"><a href="{{route('admin.menu.list',['parent_id'=>$item["id"]])}}">{{count($item->sub_cats)}}</a></td>
                                        <td style="width:150px" class="d-flex justify-content-center"><input type="text" style="width: 20%" name="order[{{$item["id"]}}]"
                                                                                                             value="{{$item['order']}}"/></td>
                                        <td style="width:150px">{{__('common.menu_type')[$item['menu_type']]}}</td>
                                        <td style="width:150px">{{$item->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex justify-content-center">
                                            <a href="{{route('admin.menu.edit',['id'=>$item['id']])}}" class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.menu.delete',['id'=>$item['id']])}}"><i
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
