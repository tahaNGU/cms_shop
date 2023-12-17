@props(['title'=>'','id'=>'','value'=>'','name'=>'','type'=>'text'])
<div class="form-group">
    <label for="{{$id}}" class="col-md-2 col-form-label">{{$title}}</label>
    <div class="col-md-10">
        <input class="form-control" type="{{$type}}" name="{{$name}}" @if(!empty($value)) value="{{$value}}" @endif id="{{$id}}">
    </div>
</div>
