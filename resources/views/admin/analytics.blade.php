<!DOCTYPE html>
<html>
<head>
    <title>آنالیز بازدید | پندوک</title>
    @include('admin.includes.headerLinks')
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

@include('admin.includes.header')
<!-- right side column. contains the logo and sidebar -->
@include('admin.includes.aside')

<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                آنالیز بازدید امروز
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li class="active">آنالیز بازدید امروز</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="col-lg-12 mt-10 connectedSortable" style="margin-top: 20px">
            <div class="box box-solid bg-gray">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn btn-primary btn-sm pull-left" data-widget="collapse"
                                data-toggle="tooltip" title="Collapse" style="margin-left: 5px;">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        کلیک های امروز
                    </h3>

                </div>


                <div class="box-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>نام دکمه</th>
                            <th>تعداد کلیک امروز</th>
                        </tr>
                        @foreach($logToday as $item)
                            <tr>
                                <td>{{$item->ref}}</td>
                                <td>{{$item->count}}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
        </section>


        <section class="col-lg-12 mt-10 connectedSortable" style="margin-top: 20px">
            <div class="box box-solid bg-gray">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn btn-primary btn-sm pull-left" data-widget="collapse"
                                data-toggle="tooltip" title="Collapse" style="margin-left: 5px;">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        کلیک های دیروز
                    </h3>

                </div>


                <div class="box-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>نام دکمه</th>
                            <th>تعداد کلیک دیروز</th>
                        </tr>
                        @foreach($logYesterday as $item)
                            <tr>
                                <td>{{$item->ref}}</td>
                                <td>{{$item->count}}</td>
                            </tr>

                        @endforeach

                    </table>
                </div>
            </div>
        </section>


        <section class="col-lg-12 mt-10 connectedSortable" style="margin-top: 20px">
            <div class="box box-solid bg-gray">
                <div class="box-header">
                    <!-- tools box -->
                    <div class="pull-left box-tools">
                        <button type="button" class="btn btn-primary btn-sm pull-left" data-widget="collapse"
                                data-toggle="tooltip" title="Collapse" style="margin-left: 5px;">
                            <i class="fa fa-minus"></i></button>
                    </div>
                    <!-- /. tools -->

                    <i class="fa fa-map-marker"></i>

                    <h3 class="box-title">
                        کلیک های کل
                    </h3>

                </div>


                <div class="box-body">
                    <table class="table table-bordered table-responsive">
                        <tr>
                            <th>نام دکمه</th>
                            <th>تعداد کلیک دیروز</th>
                        </tr>
                        @php
                        $slidec=0;
                        $promo=0;
                        $gift=0;
                        $bath=0;
                        @endphp
                        @foreach($log as $item)
                            @if($item->ref=='slide')
                                @php
                                    $slidec=$slidec+$item->count;
                                @endphp
                            @endif
                        @endforeach

                        @foreach($log as $item)
                            @if($item->ref=='homePromo')
                                @php
                                    $promo=$promo+$item->count;
                                @endphp
                            @endif
                        @endforeach

                        @foreach($log as $item)
                            @if($item->ref=='homeBath')
                                @php
                                    $bath=$bath+$item->count;
                                @endphp
                            @endif
                        @endforeach

                        @foreach($log as $item)
                            @if($item->ref=='homeGift')
                                @php
                                    $gift=$gift+$item->count;
                                @endphp
                            @endif
                        @endforeach

                        <tr>
                            <td>دکمه روی اسلاید(slide)</td>
                            <td>{{$slidec}}</td>
                        </tr>

                        <tr>
                            <td>دکمه حوله تبلیغاتی(homePromo)</td>
                            <td>{{$promo}}</td>
                        </tr>

                        <tr>
                            <td>دکمه تن پوش و دست و صورت(homeBath)</td>
                            <td>{{$bath}}</td>
                        </tr>
                        <tr>
                            <td>دکمه حوله هدیه(homeGift)</td>
                            <td>{{$gift}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@include('admin.includes.footer')

<!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->
@include('admin.includes.footerLinks')

</body>
</html>
