@extends('website.master')
@section ('content')
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
                {!! Form::open(['route'=>'contact.submit']) !!}
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <input type="text" name="name" class="form-control" id="name" placeholder="{{trans('app.Your Name')}}" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                        </div>
                        <div class="col-md-6 form-group mt-3 mt-md-0">
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{trans('app.Your Email')}}" data-rule="email" data-msg="Please enter a valid email">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="text" class="form-control" name="Tel" id="Tel" placeholder="{{trans('app.Tel')}}" required>
                    </div>
                    <div class="form-group mt-3">
                        <textarea class="form-control" name="message" rows="5" placeholder="{{trans('app.Message')}}" required></textarea>
                    </div>
                    <div class="my-3">

                    </div>
                    <div class="text-center"><button type="submit">{{trans('app.Send Message')}}</button></div>
                </form>
            </div>

        </div>
    </section><!-- End Contact Section -->

@endsection()
