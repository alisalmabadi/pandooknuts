<!DOCTYPE html>
<html>
<head>
  <title> دسته بندی ها | پندوک</title>

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
        دسته بندی ها
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active">دسته بندی ها</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          @if(isset($pm))
            <div class="alert alert-success">
              {{$pm}}
            </div>

          @endif
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title">ویرایش دسته بندی</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <div class="box-body no-padding">
              <form role="form" action="{{route('categories.update',['id'=>$mcategory->id])}}" method="POST">
                @csrf
                {{method_field('put')}}

                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">نام دسته بندی</label>
                    <input type="text" class="form-control" required id="name" value="{{$mcategory->name}}" name="name" placeholder="نام دسته بندی">
                  </div>

                  <div class="input-group" style="width: 100%;padding: 10px">
                    <div id="picture" style="width: 100%;margin: 5px auto;">
                      <a onclick="deletemainImage()">
                        <i class="fa fa-times btn btn-danger btn-lg">

                        </i>
                      </a>
                      <img style="width: 50%" src="{{$mcategory->image}}" />
                    </div>
                    <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > انتخاب تصویر </button>
                    <input  type="text" hidden name="mainImage" style="width: 100%;height: 100%" value="{{$mcategory->image}}" id="featured_image" placeholder="آدرس تصویر" readonly  />
                  </div>

                  <label for="featured" type="button" class="btn btn-default"><i class="fa fa-home"></i>
                    <input name="featured" id="featured" type="checkbox" @if($mcategory->featured==1) checked @endif/>
                    <label for="featured" class="label-info"></label>

                    نمایش در صفحه اصلی</label>
                </div>


                <!-- /.box-body -->

                <div class="box-footer">
                  <button type="submit" class="btn btn-success" style="width: 100%">ثبت</button>
                </div>
              </form>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /. box -->

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-8">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">دسته بندی ها</h3>

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
                    <th class="mailbox-star">کد دسته بندی</th>
                    <th class="mailbox-star">نام دسته بندی</th>
                    <th class="mailbox-name">تصویر</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>
                  </tr>
                  </thead>

                  <tbody>
                  @foreach($categories as $category)

                    <tr>
                      <td class="mailbox-star">{{$category->id}}</td>
                      <td class="mailbox-star"><a> {{$category->name}}</a></td>
                      <td class="mailbox-name"><img src="{{$category->image}}" style="width: 30px;"></td>
                      <td class="mailbox-subject"><a href="{{route('categories.edit',['category' => $category->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                      <td class="mailbox-subject">
                        <form action="{{route('categories.destroy',['category'=>$category->id])}}" method="post">
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
            windowURL:'/pandook-admin/elfinder/popup/main',
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
