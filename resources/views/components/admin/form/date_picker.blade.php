@props(['title'=>'','name'=>'','id'=>'','value'=>''])
<div class="form-group mb-4" style="margin-right: 1%;">
    <label>{{$title}}</label>
    <div class="input-group" style="width: 82%">
        <input type="text" class="form-control" id="{{$id}}" placeholder="yyyy/mm/dd"
               data-provide="datepicker" data-date-language="fa" data-date-orientation="right"
               data-date-autoclose="true" name="{{$name}}" value="{{$value}}">
        <div class="input-group-append">
            <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
        </div>
    </div>
    <!-- input-group -->
</div>
