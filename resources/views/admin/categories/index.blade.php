@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
<div id="tamanho" class="row">
  <div id="tamanho" class="col-12">

    <div id="tamanho" class="card">
      <div id="tamanho" class="card-header">
        <h3 class="card-title">Categories</h3>
        @if($parents)
        <span class="badge">
          <div class="row">
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parent_id']])}}">{{$parents['name']}}</a>
            </div>
            @if($parents['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parent_id']])}}">{{$parents['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents']['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['parents']['name']}}</a>
            </div>
            @endif
            @endif
            @endif
            @endif
          </div>
        </span>
        @endif

        @can('create_category')
        <div class="card-tools">
        <span class="badge badge-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Add Category
          </button>
        </span>
        </div>
        @endcan
    </div>

      <div id="tamanho" class="card-body">
        <table id="example1 tabelinha" class="table table-bordered table-striped" >
          <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th></th>
          </tr>
          </thead>
          <tbody>
            @if($categories)
            @foreach($categories as $cat)
          <tr>
            <td>{{$cat['id'] ?? null}}</td>
            <td>
              @can('edit_category')
                <input type="text" class="form-control" value="{{$cat['name'] ?? null}}" readonly="true" ondblclick="this.readOnly=!this.readOnly" onchange="changeName('{{$cat['id']}}',this.value)">
              @else
                {{$cat['name'] ?? null}}
              @endcan
            </td>
            <td>
              <div class="row">
                <div class="col">
                  <a href="{{route('categories',['id' =>$cat['id']])}}" class="link"><i class="fa-solid fa-angle-down"></i></a>
                </div>
                @can('delete_category')
                <div class="col">
                  <form class="" action="{{route('deleteCategories')}}" method="post">
                      @method('delete')
                      @csrf
                      <input type="text" hidden name="id" value="{{$cat['id']}}">
                      <button type="submit" class="btn-xs btn-danger">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>
                </div>
                <div class="col">
                  @can('edit_category')
                  <form class="" action="{{route('spamCategories')}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="text" name="id" value="{{$cat['id']}}" hidden>
                  <button class="btn-sm bg-primary">
                      <i class="fas fa-edit"></i>@if($cat['spam'])
                      Un
                      @endif
                      Spam
                  </button>
                  </form>
                  @endcan
                </div>
                @endcan
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
                 <h4 class="modal-title">Add Category</h4>
              </div>
              <div class="modal-body">
                <form action="{{route('createCategories',Request::get('id'))}}" method="POST">
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
    <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
@stop

@section('js')
<script>


 function changeName(id,value){

   $.ajax({
           url : '{{route('updateCategories')}}',
           type : 'PUT',
           data : {
             'name':value,
             'id':id,
             '_token':'{{ csrf_token() }}'
           },
           success : function(response) {

           },
           error : function(jqXHR, textStatus, errorThrown) {

           },


       });
 }

</script>
@stop
