@extends('layouts.app')

@section('stylesheet')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('app.Latest_Post')}}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'posts.store']) !!}
                        <div class="form-group @if($errors->has('photo')) has-error @endif">
                            {!! Form::label(trans('app.photo')) !!}
                            {!! Form::text('photo', null, ['class' => 'form-control', 'placeholder' => trans('app.photo')]) !!}
                            @if ($errors->has('photo'))
                                <span class="help-block">{!! $errors->first('photo') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('en_title')) has-error @endif">
                            {!! Form::label(trans('app.en_title')) !!}
                            {!! Form::text('en_title', null, ['class' => 'form-control', 'placeholder' => trans('app.en_title')]) !!}
                            @if ($errors->has('en_title'))
                                <span class="help-block">{!! $errors->first('en_title') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('ar_title')) has-error @endif">
                            {!! Form::label(trans('app.ar_title')) !!}
                            {!! Form::text('ar_title', null, ['class' => 'form-control', 'placeholder' => trans('app.ar_title')]) !!}
                            @if ($errors->has('ar_title'))
                                <span class="help-block">{!! $errors->first('ar_title') !!}</span>@endif
                        </div>


                        <div class="form-group @if($errors->has('en_details')) has-error @endif">
                            {!! Form::label(trans('app.en_details')) !!}
                            {!! Form::textarea('en_details', null, ['class' => 'form-control', 'placeholder' => trans('app.en_details')]) !!}
                            @if ($errors->has('en_details'))
                                <span class="help-block">{!! $errors->first('en_details') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('ar_details')) has-error @endif">
                            {!! Form::label(trans('app.ar_details')) !!}
                            {!! Form::textarea('ar_details', null, ['class' => 'form-control', 'placeholder' => trans('app.ar_details')]) !!}
                            @if ($errors->has('ar_details'))
                                <span class="help-block">{!! $errors->first('ar_details') !!}</span>@endif
                        </div>

                        <div class="form-group @if($errors->has('category_id')) has-error @endif">
    {!! Form::label(trans('app.Category')) !!}
    {!! Form::select('category_id[]', $categories, null, ['class' => 'form-control', 'id' => 'category_id', 'multiple' => 'multiple']) !!}@if ($errors->has('category_id'))
                                <span class="help-block">{!! $errors->first('category_id') !!}</span>
                            @endif
                        </div>



                        {!! Form::submit(trans('app.Create'),['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function () {
            CKEDITOR.replace('en_details', {
                removePlugins: 'sourcearea'
            });
            CKEDITOR.replace('ar_details', {
                removePlugins: 'sourcearea'
            });


            $('#category_id').select2({
                placeholder: "Select categories"
            });
        });
    </script>
@endsection
