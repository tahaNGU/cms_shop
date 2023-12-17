@extends('admin.layout.base')

@section('title')
    لیست  مقاله ها
@endsection

@section('content')
    @include('components.admin.error')
    <div class="col-lg-12">
        <div class="card">
            @if(isset($articles[0]))
                <form action="{{route('admin.article.action_items')}}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0 text-center">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="check_all"></th>
                                    <th>عنوان</th>
                                    <th>دسته بندی</th>
                                    <th>ترتیب</th>
                                    <th>وضعیت</th>
                                    <th>تاریخ</th>
                                    <th>#</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($articles as $article)
                                    <tr>
                                        <td scope="row"><input type="checkbox" class="check_item" name="check_item[]"
                                                               value="{{$article["id"]}}"></td>
                                        <td>{{$article["title"]}}</td>
                                        <td>{{$article->article_cat_id['title'] ?? ''}}</td>
                                        <td class="d-flex justify-content-center"><input type="text" style="width: 20%" name="order[{{$article["id"]}}]" value="{{$article['order']}}"/></td>
                                        <td>{{__('common.state')[$article['state']]}}</td>
                                        <td >{{$article->convert_Verta($article->created_at)}}</td>
                                        <td style="width:150px" class="d-flex justify-content-center">
                                            <a href="{{route('admin.article.edit',['id'=>$article["id"]])}}"
                                               class="btn btn-sm btn-primary mx-1"><i class="fas fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger"
                                               href="{{route('admin.article.delete',['id'=>$article["id"]])}}"><i
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
