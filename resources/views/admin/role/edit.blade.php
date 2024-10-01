@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{trans('app.Edit Role') .': '. $role->id }}

            <a class="btn btn-sm btn-primary float-right col-sm-2" href="{{ route('roles.index') }}">{{trans('app.Back')}} </a>

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

{!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>{{trans('app.name')}}:</strong>
            {!! Form::text('name', null, array('placeholder' => trans('app.name'),'class' => 'form-control')) !!}
        </div>
    </div>
     <div class="card-body ">
    <div class="col-xs-12 col-sm-12 col-md-12">

        <div class="form-group">
            <strong>{{trans('app.Permissions')}}:</strong>
            <br/>

            @foreach($permission as $value)
                <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
           {{ trans('app.'.$value->name) }}</label>

            <br/>
            @endforeach
            </div>

        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">{{trans('app.Submit')}}</button>
    </div>
</div>
</div>
{!! Form::close() !!}


@endsection
