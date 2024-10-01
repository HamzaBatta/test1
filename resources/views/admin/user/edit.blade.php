@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{trans('app.Edit New User') .': '. $user->id }}
                       
            <a class="btn btn-sm btn-primary float-right col-sm-2" href="{{ route('users.index') }}">{{trans('app.Back')}} </a>
                        
                    </div>
                    


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="card-body">
{!! Form::model($user, ['method' => 'PATCH','route' => ['users.update', $user->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">

            <strong>{{trans('app.name')}}:</strong>
            {!! Form::text('name', null, array('placeholder' => trans('app.name'),'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans('app.email')}}:</strong>
            {!! Form::text('email', null, array('placeholder' =>  trans('app.email'),'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans('app.Password')}}:</strong>
            {!! Form::password('password', array('placeholder' =>trans('app.Password'),'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans('app.Confirm Password')}}:</strong>
            {!! Form::password('confirm-password', array('placeholder' =>trans('app.Confirm Password'),'class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans('app.Role')}}:</strong>
            {!! Form::select('roles[]', $roles, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">{{trans('app.Submit')}}</button>
    </div>
</div>
</div>
</div>
</div>
</div>
</div>

{!! Form::close() !!}



@endsection