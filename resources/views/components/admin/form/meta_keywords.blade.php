@props(['name'=>'','title'=>'','value'=>''])
<div class="form-group">
    <label class="col-md-2 col-form-label">{{$title}}</label>
    <div class="col-md-10">
        <input type="text" data-role="{{$name}}" class="{{$name}} form-control" name="{{$name}}" value="{{$value}}">
    </div>
</div>
