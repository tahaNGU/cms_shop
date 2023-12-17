@extends('admin.layout.base')

@section('title')
    لیست محتوا ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($content[0]))
                <form action="{{route('admin.content.action_items',['module'=>$module,'item_id'=>$item_id])}}" method="post">
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
                                    <th>نوع</th>
                                    <th>ترتیب</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($content as $item)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$item["id"]}}"></th>
                                        <td style="width:230px">{{$item["title"]}}</td>
                                        <td style="width:150px">{{$item->admin->name . " ".$item->admin->lastname}}</td>
                                        <td style="width:150px">{{__('common.state')[$item['state']]}}</td>
                                        <td style="width:150px">{{__('common.content_type')[$item['kind']]}}</td>
                                        <td style="width:150px" class="d-flex justify-content-center"><input type="text"
                                                                                                             style="width: 20%"
                                                                                                             name="order[{{$item["id"]}}]"
                                                                                                             value="{{$item['order']}}"/>
                                        </td>
                                        <td style="width:150px">{{$item->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.content.edit',['id'=>$item["id"],'module'=>'page'])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.content.delete',['id'=>$item["id"]])}}"><i
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
                    </div>
                </form>
            @else
                <div class="alert alert-danger">نتیجه ای یافت نشد</div>
            @endif
        </div>
    </div>
@endsection
