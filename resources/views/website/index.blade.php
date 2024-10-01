@extends('website.master')
@section ('content')

<main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">

            @foreach($abouts as $about)
                <div class="row no-gutters">
                <img class="col-xl-5 d-flex align-items-stretch justify-content-center justify-content-lg-start" src="{{route('getImage',$about->photo)}}">
                <div class="col-xl-7 ps-0 ps-lg-5 pe-lg-1 d-flex align-items-stretch">
                    <div class="content d-flex flex-column justify-content-center">
                        <h3>{{App::isLocale('ar')?$about->ar_title:$about->en_title}}</h3>
                        <p>
                            {!!App::isLocale('ar')?$about->ar_details:$about->ar_details!!}
                        </p>

@endforeach



                        </div>

                    </div><!-- End .content-->
                </div>
            </div>


        </div>
    </section><!-- End About Section -->

    <!-- ======= Counts Section ======= -->







    </section><!-- End Counts Section -->

    <!-- ======= Clients Section ======= -->

    </section><!-- End Clients Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
        <div class="container">

            <div class="section-title">
                <h2>{{trans('app.Categories')}}</h2>
                <p></p>
            </div>
            <div class="row">
                @foreach($posts as $post)

                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-briefcase"></i></div>
                    <h4 class="title"><a href="">{{trans('app.Posts')}}</a></h4>
                    <p class="description"></p>
                    @endforeach

                </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Why Us Section ======= -->

    </section><!-- End Why Us Section -->

    <!-- ======= Portfolio Section ======= -->

    </section><!-- End Portfolio Section -->

    <!-- ======= Team Section ======= -->

    </section><!-- End Team Section -->

    <!-- ======= Pricing Section ======= -->

    </section><!-- End Pricing Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->

    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <div class="section-title">
                <h2>{{trans('app.Contact')}}</h2>
                <p></p>
            </div>

            <div class="row contact-info">

                <div class="col-md-4">
                    <div class="contact-address">
                        <i class="bi bi-geo-alt"></i>
                        <h3>{{trans('app.Address')}}</h3>
                        <address>A108 Adam Street, NY 535022, USA</address>
                    </div>
                </div>





            </div>

            <div class="form">
                <form action="forms/contact.php" method="post" role="form" class="php-email-form">
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{trans('app.Your Name')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{trans('app.Your Email')}}" data-rule="email" data-msg="Please enter a valid email">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="subject" id="subject" placeholder="{{trans('app.Tel')}}" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="{{trans('app.Message')}}" required></textarea>
                    </div>
                    <div class="my-3">
                        <div class="loading">Loading</div>
                        <div class="error-message"></div>
                        <div class="sent-message">Your message has been sent. Thank you!</div>
                    </div>
                    <div class="text-center"><button type="submit">{{trans('app.Send Message')}}</button></div>
                </form>
            </div>

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->

<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/purecounter/purecounter_vanilla.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="assets/js/main.js"></script>

</body>

</html>
@endsection()
