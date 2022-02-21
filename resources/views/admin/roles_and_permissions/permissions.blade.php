@extends('adminlte::page')
@section('title', 'Permissions')
@section('content_header')

@stop

@section('content')
<section class="content">
      <div id="tamanho" class="row">
        <div id="tamanho" class="col-12">

          <div id="tamanho" class="card">
            <div id="tamanho" class="card-header">
              <h3 class="card-title">Permissions</h3>
              <div class="card-tools">
                <span class="badge badge-primary" type="button" data-toggle="modal" data-target="#createPerm">
                  Add Permission
                </span>
              </div>
            </div>

            <div id="tamanho" class="card-body">
              <table id="example1 tabelinha" class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>name</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                  @if($perms)
                  @foreach($perms as $perm)
                <tr>
                  <td>{{$perm['id'] ?? null}}</td>
                  <td>
                    <input type="text" class="form-control" value="{{$perm['name'] ?? null}}" readonly="true" ondblclick="this.readOnly=!this.readOnly" onchange="updatePerm('{{$perm['id']}}',this.value)">
                  </td>
                  <td>
                    <form class="" action="{{route('adminDeletePerm')}}" method="post">
                        @method('delete')
                        @csrf
                        <input type="text" hidden name="id" value="{{$perm['id']}}">
                        <button type="submit" class="btn-xs btn-danger">
                          <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                  </td>
                </tr>
                @endforeach
                @endif
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="modal" id="createPerm">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h4 class="modal-title">Add Permission</h4>
             </div>
             <div class="modal-body">
               <form action="{{route('adminCreatePerm')}}" method="POST">
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

  function updatePerm($id,$val){
    try{
      $.ajax({
              url : '{{route('adminUpdatePerm')}}',
              type : 'PATCH',
              data : {
                'name':$val,
                'id':$id,
                '_token':'{{ csrf_token() }}'
              },
              success : function(response) {
                  console.log("Venue Successfully Patched!");
              },
              error : function(jqXHR, textStatus, errorThrown) {

              },


          });
    }catch(e){
      console.log('aa');
    }

  }

</script>
@stop
