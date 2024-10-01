@extends('website.master')

@section('content')
    <!-- Page Header -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>{{App::isLocale('ar') ? $category->ar_name: $category->en_name}}</h2>

        </div>

        <div class="row">
        @foreach($posts as $post)
          <div class="col-lg-4 col-md-6 icon-box">
            <div class="icon"><i class="bi bi-briefcase"></i></div>
            <h4 class="title"><a href="{{ url('post/' . $post->slug) }}">{{App::isLocale('ar') ? $post->ar_title: $post->en_title}}</a></h4>
            <p class="description">{{ App::isLocale('ar') ? $post->ar_sub_title: $post->en_sub_title }}</p>
          </div>
          @endforeach
          </div>

</div>
</section><!-- End Services Section -->
@endsection()
<style >

</style>
