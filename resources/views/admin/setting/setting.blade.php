@extends('admin.layout.base')

@section('title')
    تنظیمات
@endsection

@section('content')

    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card " style="box-shadow: none">

                        <div class="card-body">

                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link  active " id="home-tab" data-toggle="tab" href="#main" role="tab"
                                       aria-controls="home" aria-selected="true">تنظیمات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#sub" role="tab"
                                       aria-controls="profile" aria-selected="false">فرعی</a>
                                </li>

                            </ul>

                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade  show active" id="main" role="tabpanel" aria-labelledby="home-tab">
                                    @component('components.admin.form.form',['type'=>'post','action'=>route('admin.setting_store')])
                                        @slot('content')
                                            @component('components.admin.form.input',['title'=>'عنوان سایت','name'=>'title_site','value'=>config('setting.title_site')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'عنوان انگلیسی سایت','name'=>'title_site_en','value'=>config('setting.title_site_en')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'ایمیل مدیریت','name'=>'email_manager','value'=>config('setting.email_manager')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'موبایل مدیریت','name'=>'mobile_manager','value'=>config('setting.mobile_manager')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'تلفن','name'=>'tell']) @endcomponent
                                            @component('components.admin.form.input',['title'=>'کدپستی ','name'=>'postal_code','value'=>config('setting.postal_code')]) @endcomponent
                                            @component('components.admin.form.textarea',['title'=>'آدرس ','name'=>'address','value'=>config('setting.address')]) @endcomponent
                                            @component('components.admin.form.button')@endcomponent
                                        @endslot
                                    @endcomponent

                                </div>


                                <div class="tab-pane fade " id="sub" role="tabpanel" aria-labelledby="profile-tab">
                                    <h3>موارد تماس باما</h3>
                                    @component('components.admin.form.form',['type'=>'post','action'=>route('admin.setting_store')])
                                        @slot('content')
                                            @component('components.admin.form.input',['title'=>'ایمیل','name'=>'email','value'=>config('setting.email')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'آدرس','name'=>'email','value'=>config('setting.address')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'تماس','name'=>'tell','value'=>config('setting.tell')]) @endcomponent
                                            @component('components.admin.form.input',['title'=>'ساعت کاری','name'=>'working_time','value'=>config('setting.working_time')]) @endcomponent
                                            @component('components.admin.form.button')@endcomponent

                                        @endslot
                                    @endcomponent
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>

                </div>
            </div>
        </div>


@endsection



@section('script')


@endsection
