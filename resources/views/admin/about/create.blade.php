@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('app.about')}}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'abouts.store']) !!}

                        <div class="form-group @if($errors->has('photo')) has-error @endif">
                            {!! Form::label(trans('app.Photo')) !!}
                            {!! Form::text('photo', null, ['class' => 'form-control', 'placeholder' => trans('app.photo')]) !!}
                            @if ($errors->has('photo'))
                                <span class="help-block">{!! $errors->first('photo') !!}</span>@endif
                        </div>


                         <div class="form-group @if($errors->has('en_title')) has-error @endif">
                            {!! Form::label(trans('app.en_title')) !!}
                            {!! Form::text('en_title', null, ['class' => 'form-control', 'placeholder' => trans('app.en_Title')]) !!}
                            @if ($errors->has('en_title'))
                                <span class="help-block">{!! $errors->first('en_title') !!}</span>@endif
                        </div>
                            <div class="form-group @if($errors->has('ar_title')) has-error @endif">
                            {!! Form::label(trans('app.ar_title')) !!}
                            {!! Form::text('ar_title', null, ['class' => 'form-control', 'placeholder' => trans('app.ar_Title')]) !!}
                            @if ($errors->has('ar_title'))
                                <span class="help-block">{!! $errors->first('ar_title') !!}</span>@endif
                        </div>

                                        <div class="form-group
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
                      {!! Form::submit(trans('app.Create'),['class' => 'btn btn-sm btn-primary']) !!}
                        {!! Form::close() !!}
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

               });
    </script>

@endsection
