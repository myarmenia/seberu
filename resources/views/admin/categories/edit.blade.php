@extends('adminlte::page')
@section('style')
{{-- <link href="{{asset('https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css')}}" rel="stylesheet" /> --}}



@endsection

@section('content_header')

@stop


@section('content')
    <div id="tamanho" class="row">
        <div id="tamanho" class="col-12">


            <div id="tamanho" class="card">
                <div id="tamanho" class="card-header">
                    <h3 class="card-title">Characteristics</h3>



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

                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Редактировать категория</h4>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('updateCategoriesCharact',$categories->id,) }}" method="POST">
                                {{method_field('PUT')}}
                                {{ csrf_field() }}

                                <div class="form-group">

                                    <input type="text" name="name" value="{{$categories->name}}"  class="form-control">
                                    <input type="hidden" name="id" value="{{$categories->id}}"  class="form-control">
                                </div>
                                <div class="form-group">
                                    <select class="form-control  mycharacts"  name="mycharacts[]"  multiple="multiple">
                                        @foreach ($characters as $item )

                                            @if(in_array($item->id,$char_array))
                                                <option value="{{$item->id}}"  selected >{{$item->name}}</option>;
                                            @else
                                                <option value="{{$item->id}}">{{$item->name}}</option>;
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Сохранитъ</button>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


        @stop

        @section('css')
            <link rel="stylesheet" href="{{mix ('css/app.css')}}">
        @stop

        @section('js')


        @section('script')
             {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
            

        @endsection


@stop

