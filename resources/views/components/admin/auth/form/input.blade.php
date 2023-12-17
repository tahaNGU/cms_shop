@props(['label'=>'','place_holder'=>'','name'=>'','type'=>'text'])
<div class="form-group">
    <label for="{{$name}}">{{$label}}</label>
    <input type="{{$type}}" class="form-control" id="{{$name}}" name="{{$name}}" placeholder="{{$place_holder}}">
</div>
