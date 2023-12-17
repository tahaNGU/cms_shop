@props(['action'=>'','method'=>'','pic_upload'=>false])

<form action="{{$action}}" method="{{$method}}" @if($pic_upload) enctype="multipart/form-data" @endif>
    @csrf
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="text text-danger">{{$error}}</div>
        @endforeach
    @endif
    @if(session()->has('success'))
        <div class="alert alert-success">{{session()->get('success')}}</div>
    @endif
    {{$content ?? ''}}
</form>
