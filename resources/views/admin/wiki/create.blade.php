<!DOCTYPE html>
<html>
<head>
  <title>افزودن دانشنامه | پندوک</title>

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
        افزودن دانشنامه
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li >دانشنامه</li>
        <li class="active">افزودن دانشنامه</li>
      </ol>
    </section>
<form action="{{route('wiki.store')}}" method="post" enctype="multipart/form-data">
{{csrf_field()}}

<!-- Main content -->
    <section class="content">
      <div class="row">
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

          <a href="{{route('wiki.index')}}" class="btn btn-primary btn-block margin-bottom">بازگشت</a>

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
          <!-- /. box -->
          <div class="box box-solid">
            <div class="box-header with-border">
              <h3 class="box-title" id="image_title">تصویر اصلی</h3>

              <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="input-group" style="width: 100%;padding: 10px">
                <div id="picture" style="width: 100%;margin: 5px auto;"></div>
                <button type="button" class="browse btn btn-primary" id="imageUpload" style="width: 100%;padding: 10px;margin: auto" > انتخاب تصویر </button>
                <input  type="text" hidden name="mainImage" style="width: 100%;height: 100%" id="featured_image" placeholder="آدرس تصویر" readonly  />

              </div>
            </div>
            <!-- /.box-body -->
          </div>


          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">خلاصه متن</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="form-group">
                    <textarea id="brief" name="brief" class="form-control" style="height: 300px">

                    </textarea>
              </div>

            </div>
          </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">معرفی</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                    <textarea id="intro" name="intro" class="form-control" style="height: 300px">

                    </textarea>
                    </div>

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">ویژگی ها و خواص</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                    <textarea id="advantage" name="advantage" class="form-control" style="height: 300px">

                    </textarea>
                    </div>

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">انواع</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                    <textarea id="types" name="types" class="form-control" style="height: 300px">

                    </textarea>
                    </div>

                </div>
            </div>

            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">پرسش و پاسخ</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="form-group">
                    <textarea id="qa" name="qa" class="form-control" style="height: 300px">

                    </textarea>
                    </div>

                </div>
            </div>




          <div class="box box-primary">
            <div class="box-footer">
              <div class="pull-right">
                  <label for="featured" type="button" class="btn btn-default"><i class="fa fa-home"></i>
                      <input name="featured" id="featured" type="checkbox"/>
                      <label for="featured" class="label-info"></label>

                      نمایش در صفحه اصلی</label>
                <button type="submit" class="btn btn-primary" onclick="return blogvalidate()"><i class="fa fa-share"></i> انتشار</button>
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

    CKEDITOR.replace( 'brief', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });

    CKEDITOR.replace( 'intro', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });

    CKEDITOR.replace( 'advantage', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });

    CKEDITOR.replace( 'types', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });

    CKEDITOR.replace( 'qa', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'
    });





    CKEDITOR.replace( 'ckeditorlongdesc', {
        filebrowserBrowseUrl: '/pandook-admin/elfinder/ckeditor',
        contentsLangDirection : 'rtl'

    });

    CKEDITOR.replace( 'ckeditorinfo', {
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
