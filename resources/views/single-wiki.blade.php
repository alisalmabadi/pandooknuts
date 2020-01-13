<!DOCTYPE html>
<html lang="fa">

<head>
    @include('includes.headLinks')


    <title>
        ویژگی ها ، خواص و انواع
        {{\App\Category::find($wiki->cat_id)->name}}
        |
        پندوک

    </title>

    <style>

        .overlay-effect {
            padding: 0 !important;
            display: flex;
            justify-content: center;
            align-items: center;
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

        .overlay-effect {
            border-radius: 10px;
        }

        ul#nav > li:nth-child(1) > a {
            color: #ed9527;
        }


    </style>
</head>

<body>


@include('includes.header')

<div id="all">
    <section class="uza-services-area section-padding-80-0" style="margin-top: 60px;margin-bottom: 60px">
        <div class="container">
            <div class="row direction-rtl">
                <div class=" col-xl-9 col-md-12 col-sm-12 col-xs-12 col-12">
                    <div class="route">
                        <div>خانه</div>
                        <div>دانشنامه</div>
                        <div class="active">{{\App\Category::find($wiki->cat_id)->name}}</div>
                    </div>
                    <div class="wiki-title">
                        <h1>بانک اطلاعاتی {{\App\Category::find($wiki->cat_id)->name}}</h1>
                    </div>

                    <div class="wiki-section" id="intro">
                        <div class="wiki-section-title">
                            <h3>معرفی</h3>
                        </div>


                        <div class="wiki-section-body">
                           {!! $wiki->intro !!}
                        </div>
                    </div>

                    <div class="wiki-section" id="advantage">
                        <div class="wiki-section-title">
                            <h3>ویژگی ها و خواص</h3>
                        </div>


                        <div class="wiki-section-body advantage alert alert-warning">
                           {!! $wiki->advantage !!}
                        </div>
                    </div>


                    <div class="wiki-section" id="types">
                        <div class="wiki-section-title">
                            <h3>انواع</h3>
                        </div>


                        <div class="wiki-section-body">
                            {!! $wiki->types !!}
                        </div>
                    </div>

                    <div class="wiki-section" id="qa">
                        <div class="wiki-section-title">
                            <h3>پرسش و پاسخ</h3>
                        </div>


                        <div class="wiki-section-body">
                            {!! $wiki->qa !!}

                        </div>
                    </div>




                </div>
                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-12 sidebar">


                    <div class="sidebar-inner" id="sidebar_inner_titles">
                        <div id="course_student_info">
                            <span class="student_count"> {{\App\Category::find($wiki->cat_id)->name}} </span>
                            <span class="student_text">هرآنچه باید درباره {{\App\Category::find($wiki->cat_id)->name}} بدانید</span>
                        </div>
                        <ul class="menulist">
                            <li class="getrid active intro"><a href="#intro" class="anchor">معرفی</a></li>
                            <li class="getrid advantage"><a href="#advantage" class="anchor">ویژگی ها و خواص</a></li>
                            <li class="getrid types"><a href="#types" class="anchor">انواع</a></li>
                            <li class="getrid qa"><a href="#qa" class="anchor">پرسش و پاسخ</a></li>
                        </ul>
                        <div class="sidebar-buttons">
                            <a href="/shop" class="sidebar-register anchor requet-course-advice">خرید {{\App\Category::find($wiki->cat_id)->name}}</a>
                            <a href="/shop" class="sidebar-register anchor pandookbtn">فروشگاه پندوک</a> </div>
                    </div>


                </div>
            </div>
        </div>
    </section>
    <!-- ***** Services Area End ***** -->


    <div class="border-line" style="margin-top:30px"></div>

    @include('includes.footer')

</div>
<!-- ******* All JS Files ******* -->
@include('includes.footerLinks')
<script>

    var distance = $('.menulist').offset().top - $("#uzaNav").outerHeight(true),
        $window = $(window);
    var a=0;

    $(function(){
        $(window).scroll(function(){
            $('.getrid').removeClass('active');

            $('#sidebar_inner_titles').css('position','relative');
            $('#sidebar_inner_titles').css('top','unset');

            if ( $window.scrollTop() >= distance) {
                $('#sidebar_inner_titles').css('position','fixed');
                $('#sidebar_inner_titles').css('top','-34px');
            }

            var endDis=$('.border-line').offset().top - $('.pandookbtn').offset().top;

            if (endDis<800){
                if(a===0) {
                     a = $window.scrollTop() - 1000;
                }
                $('#sidebar_inner_titles').css('top',a+'px');
                $('#sidebar_inner_titles').css('position','relative');
            }



            var distanceIntro = $('#intro').offset().top - $("#uzaNav").outerHeight(true);
            var distanceAdvantage = $('#advantage').offset().top - $("#uzaNav").outerHeight(true);
            var distanceTypes = $('#types').offset().top - $("#uzaNav").outerHeight(true);
            var distanceQa = $('#qa').offset().top - $("#uzaNav").outerHeight(true);


            if ( $window.scrollTop() >= distanceQa) {
                $('.qa').addClass('active');
            }
            else if ( $window.scrollTop() >= distanceTypes) {
                $('.types').addClass('active');
            }
           else if ( $window.scrollTop() >= distanceAdvantage) {
                $('.advantage').addClass('active');
            }
            else{
                $('.intro').addClass('active');

            }

        });
    });


    $(".anchor").on('click', function(event){
        event.preventDefault();
        var o =  $( $(this).attr("href") ).offset();
        var sT = o.top - $("#uzaNav").outerHeight(true); // get the fixedbar height
        // compute the correct offset and scroll to it.
        window.scrollTo(0,sT);


        var str =$(this).attr("href");
        var res = str.replace("#", "");

        $('.getrid').removeClass('active');
        $('.'+ res).addClass('active');

    });
</script>

</body>

</html>