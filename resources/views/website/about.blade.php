@extends('website.master')
@section ('content')
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

@endsection()
