@extends('layouts.app')


@section('content')
<div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center;">                     {{trans('app.slider')}}</h2>
        </div>

    </div>
</div>



<table class="table" style="width: 90%;margin:5%;margin-top: 2%">
  <tbody class="thead-light">
  <tr>
      <th scope="row" style="width:10%">{{trans('app.Photo')}}</th>
      <td>{{ $slider->photo }}</td>
  </tr>
    <tr>
      <th scope="row">{{trans('app.en_title')}}</th>
      <td>{{ $slider->en_title }}</td>
    </tr>
        <tr>
      <th scope="row">{{trans('app.ar_title')}}</th>
      <td>{{ $slider->ar_title }}</td>
    </tr>
    <tr>

  </tbody>
</table>

        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <a class="btn btn-primary col-sm-12" href="{{ route('sliders.index') }}">{{trans('app.Back')}} </a>
        </div>
        <div class="col-sm-4"></div>
        </div>
@endsection
