<!DOCTYPE html>
<html>
<head>
  <title> محصولات | پندوک</title>

  @include('admin.includes.headerLinks')

  <link rel="stylesheet" href="/panel-admin/css/persian-datepicker-0.4.5.min.css" />
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
        محصولات
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> خانه</a></li>
        <li class="active"> محصولات</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-3">
          <a href="{{route('products.create')}}" class="btn btn-primary btn-block margin-bottom">افزودن محصول جدید</a>


          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">محصولات </h3>

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
                {{$products->links()}}

                <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">

                  <thead>
                  <tr>
                    <th class="mailbox-star">کد محصول</th>
                    <th class="mailbox-star">نام</th>
                    <th class="mailbox-name">دسته بندی</th>
                    <th class="mailbox-name">قیمت</th>
                    <th class="mailbox-subject">ویرایش</th>
                    <th class="mailbox-subject">حذف</th>

                  </tr>
                  </thead>

                  <tbody>
                  @foreach($products as $product)
                  <tr>
                    <td class="mailbox-star">{{$product->id}}</td>
                    <td class="mailbox-star"> {{$product->name}}</td>
                    <td class="mailbox-name">{{\App\Category::find($product->cat_id)->name}}</td>
                    <td class="mailbox-name">{{$product->price}}</td>
                    <td class="mailbox-subject"><a href="{{route('products.edit',['product' => $product->id])}}" class="btn btn-warning fa fa-edit"></a> </td>
                    <td class="mailbox-subject">
                      <form action="{{route('products.destroy',['products'=>$product->id])}}" method="post">
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
                {{$products->links()}}

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
<script>
    $(document).ready(function() {
        $('.page-link').addClass('btn btn-default btn-sm');
        $('.pagination').addClass('display-block');
    });

</script>
</body>
</html>
