<!DOCTYPE html>
<html lang="en">

<head>

    <title>تماس با ما - آجیل و خشکبار پندوک</title>


    @include('includes.headLinks')

    <style>
        ul#nav>li:last-child>a{
            color: #ed9527;
        }
    </style>
</head>

<body>
@include('includes.header')

<!-- ***** Header Area End ***** -->


    <!-- ***** Contact Area Start ***** -->
    <section class="uza-contact-area section-padding-80" style="margin-top: 100px;direction: rtl">
        <div class="container">
            <div class="row justify-content-between">
                <!-- Contact Form -->
                <div class="col-12 col-lg-8">
                    <div class="uza-contact-form mb-80">
                        <div class="contact-heading mb-50">
                            <h4 class="direction-rtl text-right">از طریق فرم زیر می توانید با پندوک در ارتباط باشید</h4>
                        </div>
                        <form action="#" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="full-name" placeholder="نام">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control mb-30" name="email" placeholder="ایمیل">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="full-name" placeholder="شماره تماس">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control mb-30" name="email" placeholder="نام شرکت">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class="form-control mb-30" name="message" rows="8" cols="80" placeholder="پیام"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn uza-btn btn-3 mt-15">ارسال</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Single Contact Card -->
                <div class="col-12 col-lg-3">
                    <div class="contact-sidebar-area mb-80">
                        <!-- Single Sidebar Area -->
                        <div class="single-contact-card mb-50 text-right direction-rtl">
                            <h4>با ما در ارتباط باشید</h4>
                            <h3 style="direction: ltr">+98 919 551 0020</h3>
                            <h6>info@pandooknuts.com</h6>
                        </div>


                    </div>
                </div>
            </div>

            <div class="row">
                <!-- Google Maps -->
                <div class="col-12">
                    <div class="google-maps">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.984852002108!2d51.421286315097504!3d35.67737498019522!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3f8e01f10edca423%3A0xf8b79779632a65d6!2z2LPYsdin24wg2KfZhduM2K8!5e0!3m2!1sen!2s!4v1565810859146!5m2!1sen!2s" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** Contact Area End ***** -->


    <!-- ***** Footer Area Start ***** -->
@include('includes.footer')

<!-- ***** Footer Area End ***** -->

    <!-- ******* All JS Files ******* -->
@include('includes.footerLinks')


</body>

</html>