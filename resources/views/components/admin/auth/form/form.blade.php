@props(['action'=>'','method'=>''])
<form class="form-horizontal" action="{{$action}}" method="{{$method}}">
    {{$content ?? ''}}

</form>
