@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
    <div id="tamanho" class="row">
        <div id="tamanho" class="col-12">


            <div id="tamanho" class="card">
                <div id="tamanho" class="card-header">
                    <h3 class="card-title">Characteristics</h3>


                    @can('create_category')
                        <div class="card-tools">
                            <span class="badge badge-primary">
                                 <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                   Add Characteristics
                                </button>
                            </span>
                        </div>
                    @endcan
                </div>
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(session()->has('message_error'))
                    <div class="alert alert-danger">
                        {{ session()->get('message_error') }}
                    </div>
                @endif

                <div id="tamanho" class="card-body">
                    <table id="example1 tabelinha" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($characts)
                            @foreach($characts as $dat)
                                <tr>
                                    <td>{{$dat['id'] ?? null}}</td>
                                    <td>
                                        @can('edit_category')
                                            <input type="text" class="form-control" value="{{$dat['name'] ?? null}}"
                                                   readonly="true" ondblclick="this.readOnly=!this.readOnly"
                                                   onchange="changeName('{{$dat['id']}}',this.value)">
                                        @else
                                            {{$dat['name'] ?? null}}
                                        @endcan
                                    </td>
                                    <td>
                                        <div class="row">


{{--                                            @can('delete_category')--}}
{{--                                                <div class="col">--}}
{{--                                                    <form class="" action="{{route('deleteCategories')}}" method="post">--}}
{{--                                                        @method('delete')--}}
{{--                                                        @csrf--}}
{{--                                                        <input type="text" hidden name="id" value="{{$dat['id']}}">--}}
{{--                                                        <button type="submit" class="btn-xs btn-danger">--}}
{{--                                                            <i class="fa-solid fa-trash"></i>--}}
{{--                                                        </button>--}}
{{--                                                    </form>--}}
{{--                                                </div>--}}
{{--                                            @endcan--}}
                                        </div>
                                    </td>
                                </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Добавить характеристику</h4>
                </div>
                <div class="modal-body">
                    <form action="{{route('adminCreateCharact')}}" method="POST">
                        <div class="form-group">
                            @csrf
                            <input type="text" name="name" value="" class="form-control">
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary">Save</button>
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @stop

        @section('css')
            <link rel="stylesheet" href="{{mix ('css/app.css')}}">
        @stop

        @section('js')
            <script>


                function changeName(id, value) {

                    $.ajax({
                        url: '{{route('updateCategories')}}',
                        type: 'PUT',
                        data: {
                            'name': value,
                            'id': id,
                            '_token': '{{ csrf_token() }}'
                        },
                        success: function (response) {

                        },
                        error: function (jqXHR, textStatus, errorThrown) {

                        },


                    });
                }

            </script>
@stop

