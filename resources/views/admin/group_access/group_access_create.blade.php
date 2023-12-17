@extends('admin.layout.base')

@section('title')
    سطح دسترسی جدید
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.group_access.store'),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>old('title')])@endcomponent
            <div class="d-flex flex-wrap">
                @foreach($group_access as $key_access => $value_access)
                    <div class="card mb-3 col-6">
                        <div class="card-header">@lang('module.module_title.'.$key_access)</div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap">

                                @foreach($value_access as $item)
                                    <div class="col-6">
                                        <input type="checkbox" id="{{$item}}" name="module_access[{{$item}}]"
                                               @if(!empty(old('module_access')))
                                                @if(in_array($item, old('module_access'))) checked @endif @endif>
                                        <label for="{{$item}}">
                                            {{__('module.crud_module')[$item]}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="card-footer"></div>
                    </div>
                @endforeach
            </div>
            @component('components.admin.form.button')@endcomponent
        @endslot
    @endcomponent
@endsection
