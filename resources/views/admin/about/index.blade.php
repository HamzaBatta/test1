@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('message') }}
                    </div>
                @endif

                @if(Session::has('delete-message'))
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        {{ Session('delete-message') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                       {{trans('app.about')}}
                        @can('about-create')
                      <a href="{{ route('abouts.create') }}" class="btn btn-sm btn-primary float-right ">{{trans('app.Add_New')}}</a>
                        @endcan
                        <a href="{{ route('home') }}" class="btn btn-sm btn-primary float-right ">{{trans('app.Home')}}</a>
                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th scope="col" width="60">#</th>
                                <th scope="col">{{trans('app.Title')}}</th>
                                <th scope="col" width="200">{{trans('app.creat')}}</th>
                                <th scope="col" width="400">{{trans('app.Action')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($abouts as $about)
                                <tr>
                                    <td>{{ $about->id }}</td>
                                    <td>{{App::isLocale('ar') ? $about->ar_title:$about->en_title }}</td>
                                    <td>{{ $about->user->name }}</td>
                                    <td>
                                        @can('about-edit')
                                        <a href="{{ route('abouts.edit', $about->id) }}"
                                           class="btn btn-sm btn-primary">{{trans('app.edit')}}</a>
                                        @endcan

                                            <a class="btn btn-sm  btn-success " href="{{ route('abouts.show',$about->id) }}">{{trans('app.show')}}</a>
                                            @can('about-delete')
                                        {!! Form::open(['route' => ['abouts.destroy', $about->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                        {!! Form::submit(trans('app.delete'), ['class' => 'btn btn-sm btn-danger']) !!}
                                        {!! Form::close() !!}
                                                @endcan
                                    </td>
                                </tr>
                            @endforeach
                            <form action="{{ route('search') }}" method="GET">
                                <input type="text" name="search" required/>
                                <button type="submit">Search</button>
                            </form>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
