@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                   <div class="card-header">{{trans('app.slider') .': '. $slider->id }}
                       <div class="form-group @if($errors->has('photo')) has-error @endif">
                           {!! Form::label(trans('app.Photo')) !!}
                           {!! Form::text('photo', $slider->thumbnail, ['class' => 'form-control', 'placeholder' => trans('app.photo')]) !!}
                           @if ($errors->has('photo'))
                               <span class="help-block">{!! $errors->first('photo') !!}</span>@endif
                       </div>

            <a class="btn btn-sm btn-primary float-right col-sm-2" href="{{ route('sliders.index') }}">{{trans('app.Back')}} </a></div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['sliders.update', $slider->id], 'method' => 'put']) !!}
                        <div class="box-body">


                            <div class="form-group @if($errors->has('en_title')) has-error @endif">
                                {!! Form::label(trans('app.en_title')) !!}
                                {!! Form::text('en_title', $slider->en_title, ['class' => 'form-control', 'placeholder' => trans('app.en_title')]) !!}
                                @if ($errors->has('en_title'))
                                    <span class="help-block">{!! $errors->first('en_title') !!}</span>@endif
                            </div>

                            <div class="form-group @if($errors->has('ar_title')) has-error @endif">
                                {!! Form::label(trans('app.ar_title')) !!}
                                {!! Form::text('ar_title', $slider->ar_title, ['class' => 'form-control', 'placeholder' => trans('app.ar_title')]) !!}
                                @if ($errors->has('ar_title'))
                                    <span class="help-block">{!! $errors->first('ar_title') !!}</span>@endif
                            </div>
                                    <div class="form-group @if($errors->has('en_sub_title')) has-error @endif">
                            {!! Form::label(trans('app.en_sub_title')) !!}
                            {!! Form::text('en_sub_title', $slider->en_sub_title, ['class' => 'form-control', 'placeholder' => trans('app.en_sub_title')]) !!}
                            @if ($errors->has('en_sub_title'))
                                <span class="help-block">{!! $errors->first('en_sub_title') !!}</span>@endif
                        </div>
                             <div class="form-group @if($errors->has('ar_sub_title')) has-error @endif">
                            {!! Form::label(trans('app.ar_sub_title')) !!}
                            {!! Form::text('ar_sub_title', $slider->ar_sub_title, ['class' => 'form-control', 'placeholder' => trans('app.ar_sub_title')]) !!}
                            @if ($errors->has('ar_sub_title'))
                                <span class="help-block">{!! $errors->first('ar_sub_title') !!}</span>@endif
                        </div>


                        </div>
                        <div class="box-footer">
                            {!! Form::submit(trans('app.Update'),['class' => 'btn btn-sm btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


@endsection
