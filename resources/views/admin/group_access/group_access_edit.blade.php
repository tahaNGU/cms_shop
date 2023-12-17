@extends('admin.layout.base')

@section('title')
    ویرایش سطح دسترسی
@endsection

@section('content')
    @component('components.admin.form.form',['action'=>route('admin.group_access.update',['id'=>$group_access_type_['id']]),'method'=>'post'])
        @slot('content')
            @component('components.admin.form.input',['title'=>'عنوان','id'=>'title','name'=>'title','value'=>$group_access_type_["title"]])@endcomponent
            <div class="d-flex flex-wrap">
                @foreach($group_access as $key_access => $value_access)
                    <div class="card mb-3 col-6">
                        <div class="card-header">@lang('module.module_title.'.$key_access)</div>
                        <div class="card-body">
                            <div class="d-flex flex-wrap">

                                @foreach($value_access as $item)
                                    <div class="col-6">
                                        @if(isset($group_access_type_['group_access_types']))
                                        <input type="checkbox" id="{{$item}}" name="module_access[{{$item}}]"
                                               @if(isset($group_access_type_['group_access_types']))
                                                   @if(in_array($item,$group_access_type_->getGroupAccessTypesAttribute())) checked @endif @endif>
                                        <label for="{{$item}}">
                                            {{__('module.crud_module')[$item]}}
                                        </label>
                                        @endif
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
