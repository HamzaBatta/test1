@extends('website.master')

@section('content')
    <!-- Page Header -->



    <section class="inner-page">
      <div class="container">
        <p>
        {{App::isLocale('ar') ? $post->ar_title: $post->en_title}}
        </p>
        <p >{!! App::isLocale('ar') ? $post->ar_details: $post->en_details !!}</p>
      </div>
    </section>
@endsection()
