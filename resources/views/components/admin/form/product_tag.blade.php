
@props(['title'=>'','id'=>'related_article','name'=>'','key'=>'id','value'=>'title','items'=>[],'related_arr'=>[]])
<div class="form-group mb-0" style="width: 82%;margin-right: 1%">
    <label class="control-label">{{$title}}</label>
    <select class="select2 form-control select2-multiple" id="{{$id}}" name="{{$name}}[]" multiple
            data-placeholder="انتخاب کنید ...">
        @if(isset($items[0]))
            @foreach($items as $item)

                <option {{ (in_array($item->id,$related_arr)) ? 'selected' : '' }} value="{{$item[$key]}}">{{$item[$value]}}</option>
            @endforeach
        @endif
    </select>

</div>
