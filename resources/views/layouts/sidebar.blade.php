<div class="main-menu">
    <header class="header">
        <a href="{{route('home')}}" class="logo"><i class="ico mdi mdi-cube-outline"></i>صفحة الأدمن</a>
        <button type="button" class="button-close fa fa-times js__menu_close"></button>
        <div class="user">
            <a href="{{route('users.profile.index',Auth::id())}}" class="avatar"><img src="{{(!empty(Auth::user()->image)) ? url('profiles_image/'.Auth::user()->image) : url('profiles_image/default/av01.jfif')}}" alt="" /><span class="status online"></span></a>
            <h5 class="name"><a href="#">{{Auth::user()->name}}</a></h5>
            <h5 class="position">{{Auth::user()->roles_name}}</h5>
            <div class="control-wrap js__drop_down">
                <i class="fa fa-caret-down js__drop_down_button"></i>
                <div class="control-list">
                    <div class="control-item"><a href="{{route('users.profile.index',Auth::user()->id)}}"><i class="fa fa-user"></i> البروفايل</a></div>
                    <div class="control-item"><a href="{{route('users.password.edit',Auth::user()->id)}}"><i class="fa fa-gear"></i> نغيير كلمة السر</a></div>
                    <div class="control-item"><a href="{{route('user.logout')}}"><i class="fa fa-sign-out"></i> تسجيل خروج</a></div>
                </div>
            </div>
        </div>
    </header>
    <div class="content">
        <div class="navigation">
            <h5 class="title">القوائم</h5>
            <ul class="menu js__accordion">
                <li class="current">
                    <a class="waves-effect" href="{{route('home')}}"><i class="menu-icon mdi mdi-view-dashboard"></i><span>لوحة التحكم</span></a>
                </li>
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-users"></i><span>البروفايل</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('users.profile.index',Auth::user()->id)}}">البروفايل</a></li>
                        <li><a href="{{route('users.password.edit',Auth::user()->id)}}">تغيير كلمة السر</a></li>
                    </ul>
                </li>
                @can('users')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user ico"></i><span>المستخدمين</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('users.index')}}">المستخدمين</a></li>
                    </ul>
                </li>
                @endcan

                @can('roles')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-cog"></i><span>الصلاحيات</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('roles.index')}}">صلاحيات المستخدمين</a></li>
                    </ul>
                </li>
                @endcan

                @can('categories')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-th"></i><span>الأقسام</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('categories.index')}}">جميع الأقسام</a></li>
                    </ul>
                </li>
                @endcan

                @can('books')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-book"></i><span>الكتب</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        @can('books')
                        <li><a href="{{route('books.index')}}">جميع الكتب</a></li>
                        @endcan

                        @can('books-active')
                        <li><a href="{{route('books.active')}}">الكتب المتاحة</a></li>
                        @endcan

                        @can('books-inactive')
                        <li><a href="{{route('books.inactive')}}">الكتب المستعارة</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('archives')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-archive"></i><span>الأرشيف</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        @can('users-archive')
                        <li><a href="{{route('archive.users.index')}}">أرشيف المستخدمين</a></li>
                        @endcan

                        @can('categories-archive')
                        <li><a href="{{route('archive.categories.index')}}">أرشيف الأقسام</a></li>
                        @endcan

                        @can('books-archive')
                        <li><a href="{{route('archive.books.index')}}">أرشيف الكتب</a></li>
                        @endcan
                    </ul>
                </li>
                @endcan

                @can('instructions')
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cube-outline"></i><span>الإرشادات</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('instructions.index')}}">الإرشادات</a></li>
                    </ul>
                </li>
                @endcan
                <li>
                    <a class="waves-effect parent-item js__control" href="#"><i class="menu-icon mdi mdi-cube-outline"></i><span>الإستعارات</span><span class="menu-arrow fa fa-angle-down"></span></a>
                    <ul class="sub-menu js__content">
                        <li><a href="{{route('borrowings.index')}}">الإستعارات</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /.main-menu -->
