<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-right image">
                <img src="/img/avatar/avatar.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-right info">
                <p>مدیر سایت</p>
                <a href="#"><i class="fa fa-circle text-success"></i> آنلاین</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">منو</li>
            <li>
                <a href="{{route('admin.index')}}">
                    <i class="fa fa-dashboard"></i> <span>داشبورد</span>
                </a>
            </li>
            {{--<li>--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-area-chart"></i> <span>آنالیز بازدید</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            {{--<li>--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-paint-brush"></i> <span>تنظیمات قالب</span>--}}
                {{--</a>--}}
            {{--</li>--}}
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-shopping-cart"></i>
                    <span>محصولات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('products.index')}}"><i class="fa fa-circle-o"></i>  محصولات</a></li>
                    <li><a href="{{route('products.create')}}"><i class="fa fa-circle-o"></i> افزودن محصول</a></li>
                    <li><a href="{{route('categories.index')}}"><i class="fa fa-circle-o"></i> دسته بندی</a></li>

                </ul>
            </li>

            {{--<li>--}}
                {{--<a href="">--}}
                    {{--<i class="fa fa-envelope-o"></i> <span>خبرنامه</span>--}}
                {{--</a>--}}
            {{--</li>--}}

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-pencil-square"></i>
                    <span>دانشنامه</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('wiki.index')}}"><i class="fa fa-circle-o"></i>  دانشنامه ها</a></li>
                    <li><a href="{{route('wiki.create')}}"><i class="fa fa-circle-o"></i> افزودن دانشنامه</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-newspaper-o"></i>
                    <span>اخبار</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('news.index')}}"><i class="fa fa-circle-o"></i>خبر ها</a></li>
                    <li><a href="{{route('news.create')}}"><i class="fa fa-circle-o"></i> افزودن خبر</a></li>
                </ul>
            </li>


            <li class="treeview">
                <a href="#">
                    <i class="fa fa-product-hunt"></i>
                    <span>سفارشات</span>
                    <span class="pull-left-container">
              <i class="fa fa-angle-right pull-left"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('order.create')}}"><i class="fa fa-circle-o"></i>افزودن سفارش</a></li>
                    <li><a href="{{route('order.index')}}"><i class="fa fa-circle-o"></i>سفارشات</a></li>
                </ul>
            </li>


            <li>
                <a href="{{route('index')}}">
                    <i class="fa fa-backward"></i> <span>بازگشت به سایت</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>