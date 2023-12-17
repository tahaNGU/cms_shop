@extends('admin.layout.base')

@section('title')
    لیست صفحه ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($pages[0]))
                <form action="{{route('admin.page.action_items')}}" method="post">
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
                                    <th>محتوی</th>
                                    <th>ترتیب</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$page["id"]}}"></th>
                                        <td style="width:230px">{{$page["title"]}}</td>
                                        <td style="width:150px">{{$page->admin->name . " ".$page->admin->lastname}}</td>
                                        <td style="width:150px">{{__('common.state')[$page['state']]}}</td>
                                        <td style="width:150px"><a
                                                href="{{route('admin.content.list',['item_id'=>$page["id"],'module'=>'page'])}}">{{$page->content()->count()}}</a>
                                        </td>
                                        <td style="width:150px" class="d-flex justify-content-center"><input type="text"
                                                                                                             style="width: 20%"
                                                                                                             name="order[{{$page["id"]}}]"
                                                                                                             value="{{$page['order']}}"/>
                                        </td>
                                        <td style="width:150px">{{$page->convert_Verta()}}</td>
                                        <td style="width:150px" style="width:150px" class="d-flex">
                                            <a href="{{route('admin.content.create',['item_id'=>$page["id"],'module'=>'page'])}}"
                                               class="btn btn-sm btn-secondary"><i class="fas fa-file-image"></i></a>
                                            <a href="{{route('admin.page.edit',['id'=>$page["id"]])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.page.delete',['id'=>$page["id"]])}}"><i
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
                <div class="alert alert-danger">@lang('alert_msg.error_empty')</div>
            @endif
        </div>
    </div>
@endsection
