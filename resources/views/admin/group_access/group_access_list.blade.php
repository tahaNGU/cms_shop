@extends('admin.layout.base')

@section('title')
    لیست سطح دسترسی ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($group_access_types[0]))
                <form action="{{route('admin.group_access.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">

                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th>نام کارشناس</th>

                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($group_access_types as $group_access_type)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]" value="{{$group_access_type["id"]}}"></th>
                                        <td style="width:230px">{{$group_access_type["title"]}}</td>
                                        <td style="width:150px">{{$group_access_type->admin->name . " ".$group_access_type->admin->lastname}}</td>
                                        <td style="width:150px">{{$group_access_type->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.group_access.edit',['id'=>$group_access_type["id"]])}}" class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.group_access.delete',['id'=>$group_access_type["id"]])}}"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-danger btn-sm" value="delete_all" name="action_type">حذف کلی</button>
                        </div>

                    </div>
                </form>
            @else
                <div class="alert alert-danger">@lang('alert_msg.error_empty')</div>
            @endif
        </div>
    </div>
@endsection
