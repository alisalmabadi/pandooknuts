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
                {{str_replace('-+','/',$selected_url)}}
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
                <li class="active">آنالیز بازدید</li>
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

                    <h3 class="box-title text-black">
                        بازدید های امروز
                    </h3>

                </div>


                <div class="box-body">
                    @php
                        $url_array=array();
                        $counter=1;
                    @endphp
                    @foreach($view_trackers as $track)
                        @if(!in_array($track->referral_route,$url_array))
                            @php array_push($url_array,$track->referral_route); @endphp
                        @endif
                    @endforeach

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>آدرس مرجع</th>
                            <th>تعداد بازدید</th>
                        </tr>
                        @foreach($url_array as $url)
                            @php
                                $ip_array=array();
                                $count=0;
                                $date = date('d-m-Y');
                                $track=\App\viewTracker::where('referral_route',$url)->where('visited_date',$date)->paginate(999994499970955199);
                            @endphp
                            @foreach($track as $view)
                                @if($view->is_robot==0 && !in_array($view->user_ip,$ip_array))
                                    @php $count++ @endphp
                                    @php
                                        array_push($ip_array,$view->user_ip);

                                    @endphp
                                @endif

                            @endforeach

                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$url}}</td>
                                <td>{{$count}}</td>
                            </tr>
                            @php
                                $counter=$counter+1;
                            @endphp
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

                    <h3 class="box-title text-black">
                        بازدید های دیروز
                    </h3>

                </div>


                <div class="box-body">
                    @php
                        $url_array=array();
                        $counter=1;
                    @endphp
                    @foreach($view_trackers as $track)
                        @if(!in_array($track->referral_route,$url_array))
                            @php array_push($url_array,$track->referral_route); @endphp
                        @endif
                    @endforeach

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>آدرس مرجع</th>
                            <th>تعداد بازدید</th>
                        </tr>
                        @foreach($url_array as $url)
                            @php
                                $ip_array=array();
                                $count=0;
                                $date = date('d-m-Y',strtotime("-1 days"));
                                $track=\App\viewTracker::where('referral_route',$url)->where('visited_date',$date)->where('created_at', '>=', \Carbon\Carbon::now()->subDays(1)->toDateTimeString())->where('is_robot',0)->paginate(999994499970955199);
                            @endphp
                            @foreach($track as $view)
                                @if($view->is_robot==0 && !in_array($view->user_ip,$ip_array))
                                    @php $count++ @endphp
                                    @php
                                        array_push($ip_array,$view->user_ip);

                                    @endphp
                                @endif

                            @endforeach

                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$url}}</td>
                                <td>{{$count}}</td>
                            </tr>
                            @php
                                $counter=$counter+1;
                            @endphp
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

                    <h3 class="box-title text-black">
                        بازدید های هفته گذشته
                    </h3>

                </div>


                <div class="box-body">
                    @php
                        $url_array=array();
                        $counter=1;
                    @endphp
                    @foreach($view_trackers as $track)
                        @if(!in_array($track->referral_route,$url_array))
                            @php array_push($url_array,$track->referral_route); @endphp
                        @endif
                    @endforeach

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>آدرس مرجع</th>
                            <th>تعداد بازدید</th>
                        </tr>
                        @foreach($url_array as $url)
                            @php
                                $ip_array=array();
                                $count=0;
                                $date1 = date('d-m-Y',strtotime("-7 days"));
                                $date2 = date('d-m-Y',strtotime("-8 days"));
                                $date3 = date('d-m-Y',strtotime("-9 days"));
                                $date4 = date('d-m-Y',strtotime("-10 days"));
                                $date5 = date('d-m-Y',strtotime("-11 days"));
                                $date6 = date('d-m-Y',strtotime("-12 days"));
                                $date7 = date('d-m-Y',strtotime("-13 days"));
                                $track=\App\viewTracker::where('referral_route',$url)->where('created_at', '>=', \Carbon\Carbon::now()->subDays(14)->toDateTimeString())->where('is_robot',0)->paginate(999994499970955199);
                            @endphp
                            @foreach($track as $view)
                                @if($view->is_robot==0 && !in_array($view->user_ip,$ip_array) && ($view->visited_date==$date1||$view->visited_date==$date2||$view->visited_date==$date3||$view->visited_date==$date4||$view->visited_date==$date5||$view->visited_date==$date6||$view->visited_date==$date7)  )
                                    @php $count++ @endphp
                                    @php
                                        array_push($ip_array,$view->user_ip);

                                    @endphp
                                @endif

                            @endforeach

                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$url}}</td>
                                <td>{{$count}}</td>
                            </tr>
                            @php
                                $counter=$counter+1;
                            @endphp
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

                    <h3 class="box-title text-black">
                        بازدید طی ماه گذشته
                    </h3>

                </div>


                <div class="box-body">
                    @php
                        $url_array=array();
                        $counter=1;
                    @endphp
                    @foreach($view_trackers as $track)
                        @if(!in_array($track->referral_route,$url_array))
                            @php array_push($url_array,$track->referral_route); @endphp
                        @endif
                    @endforeach

                    <table class="table table-bordered">
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>آدرس مرجع</th>
                            <th>تعداد بازدید</th>
                        </tr>
                        @foreach($url_array as $url)
                            @php
                                $ip_array=array();
                                $count=0;
                                $track=\App\viewTracker::where('referral_route',$url)->where('created_at', '>=', \Carbon\Carbon::now()->subDays(30)->toDateTimeString())->where('is_robot',0)->paginate(999994499970955199);
                            @endphp
                            @foreach($track as $view)
                                @if($view->is_robot==0 && !in_array(($view->user_ip.$view->visited_date),$ip_array))
                                    @php $count++ @endphp
                                    @php
                                        array_push($ip_array,($view->user_ip.$view->visited_date));

                                    @endphp
                                @endif

                            @endforeach

                            <tr>
                                <td>{{$counter}}</td>
                                <td>{{$url}}</td>
                                <td>{{$count}}</td>
                            </tr>
                            @php
                                $counter=$counter+1;
                            @endphp
                        @endforeach


                    </table>
                </div>

            </div>
        </section>
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
