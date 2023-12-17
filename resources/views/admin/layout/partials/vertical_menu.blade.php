<div class="vertical-menu">

    <div class="h-100">

        <div class="user-wid text-center py-4">
            <div class="user-img">
                <img src="{{asset('admin/assets/images/users/avatar-2.jpg')}}" alt="" class="avatar-md mx-auto rounded-circle">
            </div>

            <div class="mt-3">

                <a href="#" class="text-dark font-weight-medium font-size-16 line-height-h">{{auth()->user()->name . " ". auth()->user()->lastname}}</a>

            </div>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">منو</li>

                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class=" mdi mdi-settings-transfer-outline "></i>
                        <span>تنطیمات</span>
                    </a>
                    <ul>
                        <li><a href="{{route('admin.setting')}}">تنطیمات</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>مدیران</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.manager.create')}}">مدیر جدید</a></li>
                        <li><a href="">لیست مدیران</a></li>
                        <li><a href="{{route('admin.group_access.create')}}">گروه جدید مدیران</a></li>
                        <li><a href="{{route('admin.group_access.list')}}">لیست گروه مدیران</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0);" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>بنر</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.banner.create')}}">بنر جدید</a></li>
                        <li><a href="{{route('admin.banner.index')}}">لیست بنر ها</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>مقالات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.article_cat.create')}}">دسته بندی جدید</a></li>
                        <li><a href="{{route('admin.article_cat.index')}}">لیست دسته بندی</a></li>
                        <li><a href="{{route('admin.article.create')}}">مقاله جدید</a></li>
                        <li><a href="{{route('admin.article.index')}}">لیست مقاله ها</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class=" mdi mdi-file-sync "></i>
                        <span>صفحات</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{route('admin.page.create')}}">صفحه جدید</a></li>
                        <li><a href="{{route('admin.page.list')}}">لیست صفحات</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class=" mdi mdi-menu "></i>
                        <span>منو</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.menu.create')}}">منو جدید</a></li>
                        <li><a href="{{route('admin.menu.list')}}">لیست منو</a></li>

                    </ul>
                </li>

                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>ویژگی</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.attribute.create')}}">ویژگی جدید</a></li>
                        <li><a href="{{route('admin.attribute.list')}}">لیست ویژگی ها</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>دسته بندی</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.category.create')}}">ایجاد دسته بندی</a></li>
                        <li><a href="{{route('admin.category.list')}}">لیست دسته بندی</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class=" mdi mdi-cloud-question "></i>
                        <span>سوال و جواب</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.faq.create')}}">سوال جدید</a></li>
                        <li><a href="{{route('admin.faq.list')}}">لیست سوالات</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>برند</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.brand.create')}}">برند جدید</a></li>
                        <li><a href="{{route('admin.brand.list')}}">لیست برند ها</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class="mdi mdi-clipboard-list-outline"></i>
                        <span>تگ</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.tag.create')}}">تگ جدید</a></li>
                        <li><a href="{{route('admin.tag.list')}}">لیست تگ ها</a></li>

                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" class="has-arrow waves-effect">
                        <i class=" mdi mdi-cart "></i>
                        <span>محصولات</span>
                    </a>
                    <ul class="sub-menu">
                        <li><a href="{{route('admin.product.create')}}">محصولات جدید</a></li>
                        <li><a href="{{route('admin.product.list')}}">لیست محصولات ها</a></li>

                    </ul>
                </li>
            </ul>

        </div>
        <!-- Sidebar -->
    </div>
</div>
