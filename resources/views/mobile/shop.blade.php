<!DOCTYPE html>
<html lang="fa">

<head>
    @include('includes.headLinks')


    <title>پندوک - قیمت و فروش آنلاین پسته فندق بادام تخمه و انواع آجیل و خشکبار</title>

    <style>
        #all{
            margin-top: 120px;
        }

        html {
            scroll-behavior: smooth;

        }
        .cat-title{
            border: none;
            padding: 0;
            margin-bottom: 0;
        }
        ul#nav>li:nth-child(2)>a{
            color: #ed9527;
        }

    </style>
</head>

<body>

<div class="modal fade" id="myModal">
    <div class="modal-dialog" style="top: 50%;transform: translateY(-50%)!important;max-width: 700px">
        <div class="modal-content" id="addText">
            <!-- Modal body -->
            <div class="modal-body">
                <p style="text-align: center;direction: rtl;font-size: 20px">
                    جهت خرید محصولات پندوک با شماره تلفن زیر تماس حاصل نمایید:
                    <br>
                    <a href="tel:09123456765"
                       style="color: #ed9527!important;font-size: 22px!important;">02134567890</a>
                </p>
            </div>

        </div>
    </div>
</div>

@include('includes.header')
<div id="all">

    <section class="cta-testimonial-cfa-area">



        <div id="accordion">

            @foreach($categories as $category)
            <div class="card">
                <div class="card-header">
                    <div class="card-link" data-toggle="collapse" data-target="#a{{str_replace(' ','-',$category->name)}}">
                        <div class="container cat-title" id="{{str_replace(' ','-',$category->name)}}">
                            <div class="cat-name">

                                {{$category->name}}
                            </div>
                            <a href="/wiki/{{str_replace(' ','-',$category->name)}}" class="cat-wiki">دانشنامه >></a>
                        </div>
                    </div>
                </div>
                <div id="a{{str_replace(' ','-',$category->name)}}" class="collapse" data-parent="#{{str_replace(' ','-',$category->name)}}">
                    <div class="card-body">
                        <div class="row" style="direction: rtl;">
                            @foreach(\App\Product::where('cat_id',$category->id)->get() as $product)

                            <div class="col-md-6 prod-contain">
                                <div class="prod-name">{{$product->name}}</div>
                                <div class="prod-detail">
                                    <p class="prod-price">{{number_format($product->price)}} تومان</p>
                                    <a data-toggle="modal" data-target="#myModal" href="#" class="prod-buy">خرید</a>
                                </div>
                            </div>
                                @endforeach



                        </div>
                    </div>
                </div>
            </div>
                @endforeach



        </div>
    </section>
    <div class="border-line" style="margin-top:30px"></div>

    @include('includes.footer')

</div>
<!-- ******* All JS Files ******* -->
@include('includes.footerLinks')

<script>
    $(window).on('load', function () {
        var width = $('.single-portfolio-slide').width();

        $('.single-portfolio-item').css('height', width);

    });

    $(".single-portfolio-slide").on('click', function (event) {
        event.preventDefault();
        var o = $($(this).attr("href")).offset();
        var sT = o.top - $("#uzaNav").outerHeight(true); // get the fixedbar height
        // compute the correct offset and scroll to it.
        window.scrollTo(0, sT);
    });

</script>
</body>

</html>