@props(['id'=>'','title'=>'','name'=>'','value'=>''])
<div class="row">
    <div class="col-10">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">{{$title}}</h4>

                    <textarea id="{{$id}}" name="{{$name}}">@if(!empty($value)) {{$value}} @endif</textarea>

            </div>
        </div>
    </div>
    <!-- end col -->
</div>
