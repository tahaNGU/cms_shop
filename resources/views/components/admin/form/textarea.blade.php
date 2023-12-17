@props(['title'=>'','id'=>'','value'=>'','name'=>''])
<div class="form-group">
    <label for="{{$id}}" class="col-md-2 col-form-label">{{$title}}</label>
    <div class="col-md-10">
        <textarea class="form-control" type="text" name="{{$name}}" id="{{$id}}"> @if(!empty($value)) {{$value}} @endif</textarea>
    </div>
</div>
