<!DOCTYPE html>
<html lang="fa">

<head>

    <!-- Title -->
    <title>اخبار - آجیل و خشکبار پندوک</title>

    @include('includes.headLinks')

    <style>
        .more-news{
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
            cursor: pointer;
        }
        .more-news:hover {
            background-color: #000;
            color: white!important;
        }
        ul#nav>li:nth-child(3)>a{
            color: #ed9527;
        }



    </style>
</head>

<body>
@include('includes.header')

<!-- ***** Header Area End ***** -->



    <!-- ***** Blog Area Start ***** -->
    <div class="uza-blog-area section-padding-80" style="margin-top: 60px">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2> اخبار</h2>
                    </div>
                </div>
            </div>
            <div class="row">

                <!-- Single Blog Post -->
                <div class="col-12 col-lg-12 text-right direction-rtl">
                    <div class="single-blog-post bg-img mb-80"  id="all">
                        @foreach($news as $item)
                        <!-- Post Content -->
                        <div class="post-content">
                            <img class="news-img" src="{{$item->image}}" alt="">
                            <a href="#" class="post-title">{{$item->title}}</a>
                            <span class="post-date"> {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%d')}} {{\Morilog\Jalali\Jalalian::forge($item->created_at)->format('%B %y')}}</span>

                            <p>
                                {!! $item->text !!}
                                </p>

                        </div>
                            @endforeach
                    </div>
                </div>

            </div>
            <div id="loadmore" class="loadmore">
                <a class="more-news">مشاهده بیشتر</a>
            </div>


        </div>
    </div>
    <!-- ***** Blog Area End ***** -->
@include('includes.footer')

    <!-- ***** Footer Area End ***** -->
@include('includes.footerLinks')

<script>
    var page = 1;
    jQuery(document).ready(function () {

        if(page>="{{$news->lastPage()}}"){
            $('.loadmore > a').css('display','none');
        }

        jQuery('.loadmore > a').click(function (e) {
            if(page>="{{$news->lastPage()}}"){
                $('.loadmore > a').css('display','none');
            }else {
                var content=$('#all').html();


                jQuery.ajax({

                        url: "{{ route('load_news') }}",
                        method: 'get',
                        data: {
                            page: page + 1
                        },
                        success: function (response) {
                            $('#all').html(content+response);
                            page = page + 1;
                            if(page>="{{$news->lastPage()}}"){
                                $('.loadmore > a').css('display','none');

                            }
                        }
                    }
                )
            }

        });
    });
</script>

</body>

</html>