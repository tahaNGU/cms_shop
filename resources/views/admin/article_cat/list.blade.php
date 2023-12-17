@extends('admin.layout.base')

@section('title')
    لیست دسته بندی مقاله ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($article_cats[0]))
                <form action="{{route('admin.article_cat.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th>خبر ها</th>
                                    <th>ترتیب</th>
                                    <th>وضعیت</th>
                                    <th>زیر دسته</th>

                                    <th>محتوی</th>
                                    <th>تاریخ</th>
                                    <th>#</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($article_cats as $article_cat)
                                    <th scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                           value="{{$article_cat["id"]}}"></th>
                                    <td style="width:230px">{{$article_cat["title"]}}</td>
                                    <td style="width:230px">2</td>
                                    <td style="width:150px" class="d-flex justify-content-center"><input type="text"
                                                                                                         style="width: 20%"
                                                                                                         name="order[{{$article_cat["id"]}}]"
                                                                                                         value="{{$article_cat['order']}}"/>
                                    </td>
                                    <td style="width:230px">{{__('common.state')[$article_cat['state']]}}</td>
                                    <td style="width:230px"><a
                                            href="{{route('admin.article_cat.index',['parent_id'=>$article_cat["id"]])}}">{{count($article_cat->sub_cats)}}</a>
                                    </td>
                                    <td style="width:230px">1</td>
                                    <td style="width:150px">{{$article_cat->convert_Verta()}}</td>
                                    <td style="width:150px" style="width:150px" class="d-flex">
                                        <a href="{{route('admin.article_cat.edit',['id'=>$article_cat["id"]])}}"
                                           class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger"
                                           href="{{route('admin.article_cat.delete',['id'=>$article_cat["id"]])}}"><i
                                                class="fas fa-trash"></i></a>
                                    </td>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="card-footer">
                            <button class="btn btn-primary btn-sm" type="submit" value="change_state"
                                    name="action_type">تغییر وضعیت
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
