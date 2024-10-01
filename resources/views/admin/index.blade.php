@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">

                    <div class="card mt-4">
                        <div class="card-header">{{trans('app.Posts')}}</div>

                        <div class="card-body">
                            <table class="table table-bordered mb-0">
                                <thead>
                                <tr>
                                    <th scope="col" width="200">{{trans('app.Title')}}</th>
                                    <th scope="col" width="200">{{trans('app.creat')}}</th>
                                    <th scope="col" width="200">{{trans('app.Action')}}</th>
                                </tr>
                                </thead>

                                <tbody>

                                </tbody>
                            </table>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
