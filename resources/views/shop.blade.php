<!DOCTYPE html>
<html lang="fa">

<head>
    @include('includes.headLinks')


    <title>فروشگاه پندوک - قیمت و فروش آنلاین پسته فندق بادام تخمه و انواع آجیل و خشکبار</title>

    <style>

        .overlay-effect,.overlay-show {
            padding: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(237, 149, 39, 0.9);

        }

        .single-portfolio-slide {
            display: block;
        }

        .single-portfolio-item {
            margin-bottom: 20px;
        }

        html {
            scroll-behavior: smooth;

        }
        .overlay-effect,.overlay-show{
            border-radius: 10px;
        }

        ul#nav>li:nth-child(2)>a{
            color: #ed9527;
        }
        .overlay-show>h4{
            font-size: 1.5rem;
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
                <a href="tel:09123456765" style="color: #ed9527!important;font-size: 22px!important;">02134567890</a>
                </p>
            </div>

        </div>
    </div>
</div>

@include('includes.header')
<div id="all">
<section class="uza-services-area section-padding-80-0" style="margin-top: 60px;margin-bottom: 60px">
    <h1 class="text-center">محصولات</h1>
    <h2 class="text-center" style="font-size: 12px">برای مشاهده محصولات ، روی یکی از دسته های زیر کلیک کنید</h2>

    <div class="container"
         style="background-color: #ffeddf;border-radius: 10px;padding: 20px 20px 0 20px;box-sizing: border-box">
        <div class="row" style="direction: rtl;">

            <!-- Single Service Area -->


        @foreach($categories as $category)
            <div class="col-12 col-sm-2 col-lg-2 col-xl-2 single-portfolio-item market-analytics">
                <a href="#{{str_replace(' ','-',$category->name)}}" class="single-portfolio-slide">
                    <img src="{{$category->image}}" alt="">
                    <!-- Overlay Effect -->
                    <div class="overlay-show">
                        <h4>{{$category->name}}</h4>
                    </div>
                    <!-- View More -->

                </a>
            </div>
            @endforeach

        </div>
    </div>
</section>
<!-- ***** Services Area End ***** -->

<!-- ***** CTA, Testimonial & CFA Area Start ***** -->
<section class="cta-testimonial-cfa-area">

    @foreach($categories as $category)
    <div class="container cat-title" id="{{str_replace(' ','-',$category->name)}}">
        <div class="cat-name">
            {{$category->name}}
        </div>
        <a href="/wiki/{{str_replace(' ','-',$category->name)}}" class="cat-wiki">دانشنامه >></a>
    </div>
    <div class="container">
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
        @endforeach

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

    $(".single-portfolio-slide").on('click', function(event){
        event.preventDefault();
        var o =  $( $(this).attr("href") ).offset();
        var sT = o.top - $("#uzaNav").outerHeight(true); // get the fixedbar height
        // compute the correct offset and scroll to it.
        window.scrollTo(0,sT);
    });

</script>
</body>

</html>