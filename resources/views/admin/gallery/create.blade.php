@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">    {{trans('app.Galleries') }}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'galleries.store', 'enctype' => 'multipart/form-data']) !!}

                        <div class="form-group @if($errors->has('photo')) has-error @endif">
                            {!! Form::label(trans('app.Photo'), null, ['style' => 'display: block;']) !!}
                            {!! Form::file('photo[]', ['multiple' => 'multiple']) !!}
                            @if ($errors->has('photo'))<span
                                    class="help-block">{!! $errors->first('photo') !!}</span>@endif
                        </div>

                        {!! Form::submit(trans('app.Create'),['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div
        </div>
    </div>
@endsection
