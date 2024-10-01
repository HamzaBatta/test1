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
                        {{trans('app.Galleries') }}
                        @can('gallery-create')
                        <a href="{{ route('galleries.create') }}" class="btn btn-sm btn-primary float-right">{{ trans('app.Add_New') }}</a>
                        @endcan
                        <a href="{{ route('home') }}" class="btn btn-sm btn-primary float-right">{{trans('app.home')}}</a>

                    </div>

                    <div class="card-body">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr scope="row">
                                <th  scope="col" width="60">#</th>
                                <th scope="col" >{{trans('app.Url')}}</th>

                                <th scope="col" >{{ trans('app.Action') }}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($galleries as $gallery)
                                <tr >
                                    <td scope="row">{{ $gallery->id }}</td>
                                    <td>{{ $gallery->photo }}</td>

                                    <td>

                                        @can('gallery-delete')
                                         <button class=" btn btn-sm btn-danger openModal" id='{{ "openModal".$gallery->id }}' onclick='{{ "runme(openModal".$gallery->id.")" }}' >{{trans('app.delete')}}</button>

                                        <div class=" modal" id='{{ "m_openModal".$gallery->id }}'>
                                        <div class="modalContent">
                                        <span class="close" onclick='{{ "hideme(openModal".$gallery->id.")" }}' id='{{ "c_openModal".$gallery->id }}'>×</span>
                                        <p>{{trans('app.Are you sure you want to delete this Item')}}</p>
                                        {!! Form::open(['route' => ['galleries.destroy', $gallery->id], 'method' => 'delete', 'style' => 'display:inline']) !!}
                                        <button class="del" onclick='{{ "hideme(openModal".$gallery->id.")" }}'>{{trans('app.delete')}}</button>
                                        {!! Form::close() !!}
                                        <button class="cancel" onclick='{{ "hideme(openModal".$gallery->id.")" }}'>{{trans('app.cancel')}}</button>
                                            @endcan
                                        </div>
                                        </div>


                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <script>
       function hideme(delete_button) {
        var modal = document.getElementById("m_"+delete_button.id);
        if(modal)
          modal.style.display = "none";
       }
        function runme(delete_button)
        {
           var modal = document.getElementById("m_"+delete_button.id);
           var btn = document.getElementById(delete_button.id);
           var span = document.getElementById("c_"+delete_button.id);
           btn.addEventListener("click", () => {
              modal.style.display = "block";
           });
           span.addEventListener("click", () => {
              hideme(modal);
           });
           window.onclick = function(event) {
              if (event.target == modal) {
                 hideme(modal);
              }
           };
        }
</script>
@endsection


<style>
   body {
      font-family: Arial, Helvetica, sans-serif;
   }
   .modal {
      text-align: center;
      display: none;
      position: fixed;
      z-index: 1;
      padding-top: 100px;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.4);
   }
   .modalContent {
      font-size: 20px;
      font-weight: bold;
      background-color: #fefefe;
      margin: auto;
      padding: 20px;
      border: 1px solid #888;
      width: 40%;
   }
   .close {
      color: rgb(255, 65, 65);
      float: right;
      font-size: 40px;
      font-weight: bold;
   }
   .close:hover, .close:focus {
      color: #ff1010;
      cursor: pointer;
   }
   .modalContent button {
      border: none;
      border-radius: 4px;
      font-size: 18px;
      font-weight: bold;
      padding: 10px;
   }
   .del {
      background-color: rgb(255, 65, 65);
   }
   .del:hover {
      background-color: rgb(255, 7, 7);
   }
   .cancel:hover {
      background-color: rgb(167, 167, 167);
   }
</style>
