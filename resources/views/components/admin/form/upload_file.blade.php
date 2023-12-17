@props(['title'=>'','id'=>'','name'=>'','value'=>''])
<div class="form-group" style="margin-right: 1%;">
    <label for="" class="col-md-2 col-form-label">{{$title}}</label>
    <div class="col-md-10">
        <input type="file" class="custom-file-input" id="{{$id}}" name="{{$name}}">
        <label class="custom-file-label" for="{{$id}}">انتخاب فایل</label>
    </div>
    @if(!empty($value))
        <input type="text" dir="ltr" name="upload_value_{{$name}}" data-value="{{$id}}" style="width: 83.5%" value="{{$value}}" class="form-control">
    @endif
</div>
