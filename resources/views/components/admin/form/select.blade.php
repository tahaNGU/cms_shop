@props(['title'=>'','array'=>$array,'name'=>'','id'=>'','value'=>''])
<div class="form-group">
    <label for="{{$id}}" class="col-md-2 col-form-label">{{$title}}</label>
    <div class="col-md-10">
        <select class="form-control" name="{{$name}}" id="{{$id}}">
            <option value="">انتخاب کنید</option>
            @foreach($array as $key => $value_select)

                <option value="{{$key}}" @if($key == $value) selected @endif>{{$value_select}}</option>
            @endforeach
        </select>
    </div>
</div>


