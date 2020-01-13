<!DOCTYPE html>
<html>
<head>
  <title>افزودن نوع سفارش | پندوک</title>

  @include('admin.includes.headerLinks')
<style>
  .display-none{
    display: none!important;
  }
  .hidden{
    visibility: hidden;
  }
  .variableImage{
    width: 50px;
  }
  .add-gallery{
    display: block;
    background-color: #f2f2f2;
    height: 100px;
    border: dashed black 1px;
    text-align: center;
    font-size: 18px;
    line-height: 100px;
    padding: 0;
      z-index: 9999999;

  }
    .deletegaler{
        display: block;
        background-color: rgba(0,0,0,0.3);
        transform: translateY(-100px);
    }
  .wronginput{
    border: red 1px solid;
  }

</style>
  <link rel="stylesheet" href="/panel-admin/css/persian-datepicker-0.4.5.min.css" />
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <script type="text/javascript" src="/js/jquery.popupWindow.js"></script>

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
        افزودن نوع سفارش
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li >نوع سفارش</li>
        <li class="active">افزودن نوع سفارش</li>
      </ol>
    </section>
<form action="{{route('orderType.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<!-- Main content -->
    <section class="content">
      <div class="row">
{{--
        <div class="col-md-3">
          @if(isset($pm))
            <a  class="btn btn-success btn-block margin-bottom">            {{$pm}}
            </a>


          @endif


              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif



              <div class="box box-solid">
                  <div class="box-header with-border">
                      <h3 class="box-title" id="tag_title">دسته بندی</h3>

                      <div class="box-tools">
                          <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                          </button>
                      </div>
                  </div>
                  <div class="box-body no-padding">
                      <select name="categories" id="" class="form-control">

                          @foreach($categories as $category)
                              <option value="cat{{$category->id}}">{{$category->name}}</option>
                          @endforeach
                      </select>


                  </div>
                  <!-- /.box-body -->
              </div>

        </div>
--}}
        <!-- /.col -->
        <div class="col-md-12">
            <a href="{{route('orderType.index')}}" class="btn btn-primary btn-block margin-bottom">بازگشت</a>
          <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title"> نام</h3>
                <div class="box-body">

                <div class="form-group col-md-8">
                    <input class="form-control" name="title" id="name" placeholder="نام نوع محصول">
                </div>

                    <div class="form-group col-md-4">
                        <div class="form-group">
                            <select class="form-control" name="status">
                                <option value="0">غیرفعال</option>
                                <option value="1" selected>فعال</option>
                            </select>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box-header -->

          </div>

          <div class="box box-primary">
            <div class="box-footer">
              <div class="pull-right">
                <button type="submit" class="btn btn-primary"><i class="fa fa-share"></i> انتشار</button>
              </div>
            </div>
          </div>
            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
        </div><!-- /.col -->
      <!-- /.row -->
    </section>
    <!-- /.content -->
 </form>
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
<script>

    CKEDITOR.replace( 'text', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });


</script>


<script src="/js/add-blog.js"></script>
<!-- Page script -->

<script>
    //numeric only
    function validatenumericsnum(key) {
        var keycode = (key.which) ? key.which : key.keyCode;
        if (keycode > 31 && (keycode < 48 || keycode > 57))
            return false;
        else
            return true;
    }
    //numeric only


</script>
<script type="text/javascript" src="/js/jquery.popupWindow.js"></script>
<script type="text/javascript">

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
