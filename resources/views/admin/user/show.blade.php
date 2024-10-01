@extends('layouts.app')


@section('content')
<div class="card-body">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="text-align: center;">{{trans('app.Show User')}} </h2>
        </div>
    </div>
</div>

<table class="table" style="width: 90%;margin:5%;margin-top: 2%">   
  <tbody class="thead-light">
    <tr>
      <th scope="row" style="width:10%">{{trans('app.name')}}</th>
      <td>  {{ $user->name }}</td>
    </tr>
       <tr>
      <th scope="row">{{trans('app.email')}}</th>
      <td>  {{ $user->email }}</td>
    </tr>
    <tr>
      <th scope="row">{{trans('app.Role')}}</th>
      <td>  @if(!empty($user->getRoleNames()))
                @foreach($user->getRoleNames() as $v)
                    <label class="badge badge-success">{{ $v }}</label>
                @endforeach
                    @endif</td>
    </tr>


  </tbody>
</table>

        <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4">
            <a class="btn btn-primary col-sm-12" href="{{ route('users.index') }}">{{trans('app.Back')}} </a>
        </div>
        <div class="col-sm-4"></div>
        </div>
@endsection