<!DOCTYPE html>
<html>
<head>
  <title>سفارشات | پندوک</title>

  @include('admin.includes.headerLinks')
<style>
    span.select2 {
        width: 100% !important;
    }

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

    .productitem{
        background: #e9e9e9;
        border:1px solid black;
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

      @if(session('success'))

      <div class="alert alert-success">
          سفارش با موفقیت افزوده شد.
      </div>
          @endif
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        افزودن سفارش
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li >سفارشات</li>
        <li class="active">افزودن سفارش</li>
      </ol>
    </section>
<form action="#" method="post" enctype="multipart/form-data" id="submitOrderForm">
{{csrf_field()}}

<!-- Main content -->
    <section class="content">
      <div class="panel panel-default">
          <div class="panel-heading">
              <h3 class="panel-title">
              افزودن سفارش
              </h3>
          </div>
          <div class="panel-body">
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

          <a href="{{route('order.index')}}" class="btn btn-primary btn-block margin-bottom">بازگشت</a>


        </div>
--}}
        <!-- /.col -->
        <div class="col-md-12">

            <div class="form-group">
                      <label class="control-label col-md-4"> قیمت به تومان</label>
                      <input class="form-control col-md-4" type="number" name="total_price" id="price" placeholder="قیمت محصول" required>

                <label class="control-label col-md-2">نوع سفارش</label>
                <select class="form-control col-md-2 " name="orderType">

                    @foreach($orderTypes as $orderType)
                        <option value="{{$orderType->id}}">{{$orderType->title}}</option>
                    @endforeach
                </select>


                  </div>
<br>
            <br>

            <button class="btn btn-warning center-block" style="width:60%; float:none; margin:0 auto; text-align: center;margin-bottom: 13px; " type="button" id="product-add">
                <i class="fa fa-plus"></i>
                افزودن مورد

            </button>
                <div class="panel productitem" id="product">
<div class="panel-body">
                      <div class="form-group">
                          <select id="listCategories" class="form-control col-md-2 listCategories" data-item="0">

<option id="cat_pro" value="">دسته بندی محصول</option>

                              @foreach($categories as $category)
                                  <option value="{{$category->id}}">{{$category->name}}</option>
                              @endforeach
                          </select>

                          <div class="col-md-4">
                              <select id="productCat" name="products[]"></select>
                          </div>
                          <div class="control-label col-md-1">
                             تعداد (اختیاری)
                          </div>
                          <div class="col-md-2">
                              <input class="form-control countProduct" type="number" name="count[]" id="countProduct">
                          </div>

                          <div class="control-label col-md-1">
                              وزن (اختیاری)
                          </div>
                          <div class="col-md-2">
                              <input class="form-control weightProduct" type="number" name="weight[]" id="weightProduct">
                          </div>


                  </div>

                  <!-- /.box-body -->

                </div>

                </div>

            <div id="productitems">

            </div>

            <h3>اطلاعات اختیاری مشتری</h3>
            <div class="user_info">
                <br>
                <div class="control-label col-md-1">
                    نام
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="name" id="nameUser">
                </div>

                <div class="control-label col-md-2">
                   نام خانوادگی
                </div>
                <div class="col-md-2">
                    <input class="form-control" type="text" name="lastname" id="lastnameUser">
                </div>

                <div class="control-label col-md-2">
                    شماره مبایل
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="text" name="phone" id="phoneUser">
                </div>
            </div>

                    <div class="pull-left">
                        <br>
                        <button type="button" class="btn btn-success" id="submitOrder"><i class="fa fa-share"></i> ذخیره </button>
                    </div>



          </div>


            <!-- /.box-footer -->
          </div>
          <!-- /. box -->
      {{--  </div><!-- /.col -->--}}
      </div>

      <!-- /.row -->
    </section>
    <!-- /.content -->
 </form>
  </div>
  <!-- /.content-wrapper -->
<input type="hidden" id="itemcount" value="1">
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

<script src="{{asset('js/sweetalert2@8.js')}}"></script>
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
<script type="text/javascript" src="{{asset('js/select2.full.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/fa.js')}}"></script>

<script type="text/javascript">



    $("#productCat").select2({
        theme: "classic"
    });

    $('#listCategories').change(function () {
        var cat_id = $(this).val();
        $('#cat_pro').remove();

        $.ajax({
            url: '{{route('productCat')}}',
            data: {c_id: cat_id, _token: '{{csrf_token()}}'},
            method: 'post',
            success: function (data) {
                $('#productCat').html(`${data}`);
                $('#productCat').trigger('change');
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

/*
   var j = $('#itemcount').val();

for(var i=1;i<=j;i++){
*/

function productCategory(item){
        //var cat_id = item.value;
        var cat_id = item.value;

    var i = $(item).data('item');

        $.ajax({
            url: '{{route('productCat')}}',
            data: {c_id:cat_id , _token: '{{csrf_token()}}' },
            method: 'post',
            success:function (data) {
                $('#productCat'+i).html(`${data}`);
                $('#productCat'+i).trigger('change');
            },
            error:function (error) {
                console.log(error);
            }
        });
}

    $('#product-add').click(function () {
        var i = $('#itemcount').val();


        $('#productitems').append(`<div class="panel productitem" id="product${i}">
<div class="panel-body">
                      <div class="form-group">

                          <select id="listCategories${i}" class="form-control col-md-2 listCategories" data-item="${i}" onchange="productCategory(this)">
<option value="0">دسته بندی محصول را انتخاب کنید</option>
            </select>

            <div class="col-md-4">
                <select id="productCat${i}" name="products[]"></select>
            </div>
            <div class="control-label col-md-1">
               تعداد (اختیاری)
            </div>
            <div class="col-md-2">
                <input class="form-control countProduct" type="number" name="count[]"  id="countProduct">
            </div>

            <div class="control-label col-md-1">
                وزن (اختیاری)
            </div>
            <div class="col-md-2">
                <input class="form-control weightProduct" type="number" name="weight[]"  id="weightProduct">
            </div>
    </div>

            </div>

<button type="button" class="btn btn-danger dlproduct" id="deleteItem${i}" data-item="${i}" style="margin: 0 auto;float: none;text-align: center;display: block;margin-bottom: 7px;width: 25%;"> حذف  <i class="fa fa-trash"></i></button>

            </div>
            `);

        $("#productCat"+i).select2({
            theme: "classic"
        });
        i++;
        $('#itemcount').val(i);

        $('#listCategories').one('click',function () {
            var element = this;

            $.ajax({
                url: '{{route('listCat')}}',
                data: {_token: '{{csrf_token()}}'},
                method: 'post',
                success:function (data) {
                    $(element).html(`${data}`);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        });

        var j = $('#itemcount').val();

        for(var i=1;i<=j;i++){
            $('#listCategories'+i).one('click',function () {
                var element = this;

                $.ajax({
                    url: '{{route('listCat')}}',
                    data: {_token: '{{csrf_token()}}' },
                    method: 'post',
                    success:function (data) {
                        $(element).html(`${data}`);
                    },
                    error:function (error) {
                        console.log(error);
                    }

                });
            });

        }

        $('.dlproduct').click(function () {
            var item = $(this).data('item');
            $("#product"+item).remove();
        });
    });

$('#submitOrder').click(function (e) {
   e.preventDefault();
   var data = $('#submitOrderForm').serialize();
    $.ajax({
        url: '{{route('submitOrder')}}',
        data: data,
        method: 'post',
        success:function (data) {
            Swal.fire(
                'با موفقیت ذخیره شد.!',
                'سفارش با موفقیت ذخیره گردید',
                'success'
            );
           console.log(data);
            $('#price').val('');

            $('#nameUser').val('');
            $('#lastnameUser').val('');
            $('#phoneUser').val('');

            $('.weightProduct').val('');
            $('.countProduct').val('');
        },
        error:function (error) {
            Swal.fire(
                'مشکلی پیش آمده!',
                'اروری در ذخیره سازی رخ داده',
                'error'
            );
            console.log(error);
        }

    });

});

</script>
</body>
</html>
