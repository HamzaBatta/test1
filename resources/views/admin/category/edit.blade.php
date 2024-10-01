@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('app.category') .': '. $category->id }}
                        <div class="form-group @if($errors->has('photo')) has-error @endif">
                            {!! Form::label(trans('app.Photo')) !!}
                            {!! Form::text('photo', $category->thumbnail, ['class' => 'form-control', 'placeholder' => trans('app.photo')]) !!}
                            @if ($errors->has('photo'))
                                <span class="help-block">{!! $errors->first('photo') !!}</span>@endif
                        </div>

                        <a class="btn btn-sm btn-primary float-right col-sm-2" href="{{ route('categories.index') }}">{{trans('app.Back')}} </a></div>

                    <div class="card-body">
                        {!! Form::open(['route' => ['categories.update', $category->id], 'method' => 'put']) !!}
                        <div class="box-body">


                            <div class="form-group @if($errors->has('en_name')) has-error @endif">
                                {!! Form::label(trans('app.en_name')) !!}
                                {!! Form::text('en_name', $category->en_name, ['class' => 'form-control', 'placeholder' => trans('app.en_name')]) !!}
                                @if ($errors->has('en_name'))
                                    <span class="help-block">{!! $errors->first('en_name') !!}</span>@endif
                            </div>

                            <div class="form-group @if($errors->has('ar_name')) has-error @endif">
                                {!! Form::label(trans('app.ar_name')) !!}
                                {!! Form::text('ar_name', $category->ar_name, ['class' => 'form-control', 'placeholder' => trans('app.ar_name')]) !!}
                                @if ($errors->has('ar_name'))
                                    <span class="help-block">{!! $errors->first('ar_name') !!}</span>@endif
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
