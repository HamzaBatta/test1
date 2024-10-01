@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{trans('app.category')}}</div>

                    <div class="card-body">
                        {!! Form::open(['route' => 'categories.store']) !!}
                        <div class="form-group @if($errors->has('photo')) has-error @endif">
                            {!! Form::label(trans('app.Photo')) !!}
                            {!! Form::text('photo', null, ['class' => 'form-control', 'placeholder' => trans('app.Photo')]) !!}
                            @if ($errors->has('photo'))
                                <span class="help-block">{!! $errors->first('photo') !!}</span>@endif
                        </div>


                        <div class="form-group @if($errors->has(trans('app.name'))) has-error @endif">
                            {!! Form::label(trans('app.en_name')) !!}
                            {!! Form::text('en_name', null, ['class' => 'form-control', 'placeholder' =>trans('app.en_name')]) !!}
                            @if ($errors->has('en_name'))
                                <span class="help-block">{!! $errors->first('en_name') !!}</span>@endif
                        </div>
                        <div class="form-group @if($errors->has('ar_name')) has-error @endif">
                            {!! Form::label(trans(trans('app.ar_name'))) !!}
                            {!! Form::text('ar_name', null, ['class' => 'form-control', 'placeholder' => trans('app.ar_name')]) !!}
                            @if ($errors->has('ar_name'))
                                <span class="help-block">{!! $errors->first('ar_name') !!}</span>@endif
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



@endsection
