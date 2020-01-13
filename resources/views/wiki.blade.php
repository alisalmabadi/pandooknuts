<!DOCTYPE html>
<html lang="fa">

<head>
    @include('includes.headLinks')


    <title>دانشنامه - آجیل و خشکبار پندوک</title>

    <style>

        .more-wiki{
            line-height: 30px;
            text-align: center;
            border-radius: 10px;
            padding: 10px 30px;
            background: #ed9527;
            height: 50px;
            color: white;
            display: block;
            margin: 0 auto;
            width: 200px;
        }

        ul#nav>li:nth-child(1)>a{
            color: #ed9527;
        }


    </style>
</head>

<body>


@include('includes.header')

<div id="all">
<section class="uza-services-area section-padding-80-0" style="margin-top: 60px;margin-bottom: 60px">
    <div class="container">
        <div class="row">
            <!-- Section Heading -->
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>دانشنامه</h2>
                </div>
            </div>
        </div>
        <div class="row direction-rtl">


        @foreach($wikis as $wiki)
            <!-- Single Blog Post -->
            <div class="col-12 col-lg-4 text-right direction-rtl">
                <div class="single-blog-post bg-img mb-80">
                    <!-- Post Content -->

                    <div class="post-content">
                        <img class="post-img" src="{{$wiki->image}}" alt="خواص {{\App\Category::find($wiki->cat_id)->name}}">
                        <span class="post-date"> <span>{{\Morilog\Jalali\Jalalian::forge($wiki->created_at)->format('%d')}}</span> {{\Morilog\Jalali\Jalalian::forge($wiki->created_at)->format('%B %y')}}</span>
                        <a href="/wiki/{{\App\Category::find($wiki->cat_id)->name}}" class="post-title">{{\App\Category::find($wiki->cat_id)->name}}</a>
                        <p>
                            {!! $wiki->brief !!}
                        </p>
                        <a href="/wiki/{{str_replace(' ','-', \App\Category::find($wiki->cat_id)->name) }}" class="read-more-btn"> مشاهده مطلب <i class="arrow_carrot-2left"></i></a>
                    </div>
                </div>
            </div>
            @endforeach









        </div>

        <a href="/about" class="more-wiki">مشاهده بیشتر</a>

    </div>

</section>
<!-- ***** Services Area End ***** -->


<div class="border-line" style="margin-top:30px"></div>

@include('includes.footer')

</div>
<!-- ******* All JS Files ******* -->
@include('includes.footerLinks')

<script>


</script>
</body>

</html>