<!DOCTYPE html>
<html>
<head>
  <title> کاربران | پندوک</title>

  @include('admin.includes.headerLinks')

<style>
  .display-block{
    display: block!important;
    margin: 0!important;
  }
</style>


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
        کاربران
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> کاربران</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

          <!-- /. box -->

          <!-- /.box -->
        <!-- /.col -->
        <div class="col-md-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">کاربران</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <form action="{{route('colors.search')}}" method="get">
                  <input type="text" name="search" class="form-control input-sm" placeholder="جستجو">
                    <button type="submit" class="fa fa-search form-control-feedback" value="search"></button>
                  </form>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
               <div class="pull-right">



               </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>

                <div class="pull-left">


                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد کاربر</th>
                    <th class="mailbox-star">نام و نام خانوادگی</th>
                    <th class="mailbox-name">ایمیل</th>
                    <th class="mailbox-subject">وضعیت</th>
                    <th class="mailbox-subject">حذف</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($users as $user)
                  <tr>
                    <td class="mailbox-star">{{$user->id}}</td>
                    <td class="mailbox-star"><a> {{$user->name}} {{$user->last_name}}</a></td>
                    <td class="mailbox-name">{{$user->email}}</td>
                    <td class="mailbox-subject">@if($user->email_verified_at==null) غیر فعال @else فعال @endif </td>
                    <td class="mailbox-subject">
                      <form action="{{route('users.destroy',['user'=>$user->id])}}" method="post">
                        {{method_field('delete')}}
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-danger fa fa-trash"></button>
                      </form>
                    </td>

                  </tr>
                  @endforeach
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <div class="pull-right">


                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-left">


                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
            </div>
          </div>
          <!-- /. box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
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
<!-- iCheck -->
<!-- Page Script -->

<!-- AdminLTE for demo purposes -->
<script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });
    $(document).ready(function(){

        $('#imageUpload').popupWindow({
            windowURL:'/roza-admin/elfinder/popup/main',
            windowName:'Filebrowser',
            height:490,
            width:950,
            centerScreen:1
        });
        window.callbackmain=function (file){
            $('#picture').html('<a onclick="deletemainImage()"><i class="fa fa-times btn btn-danger btn-lg"></i></a><img style="width: 50%" src="' + file + '" /> ');
            $('#featured_image').val(file);
        }
    });

    function deletemainImage() {
        $('#picture').html('');
        $('#featured_image').val('');
    }
</script>
</body>
</html>
