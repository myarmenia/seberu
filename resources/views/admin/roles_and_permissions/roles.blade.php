@extends('adminlte::page')
@section('title', 'Roles')
@section('content_header')

@stop

@section('content')
<section class="content">
      <div id="tamanho" class="row">
        <div id="tamanho" class="col-12">

          <div id="tamanho" class="card">
            <div id="tamanho" class="card-header">
              <h3 class="card-title">Roles</h3>
              <div class="card-tools">
                <span class="badge badge-primary" type="button" data-toggle="modal" data-target="#createRole">
                  Add Role
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
                  @if($roles)
                  @foreach($roles as $role)
                <tr>
                  <td>{{$role['id'] ?? null}}</td>
                  <td>{{$role['name'] ?? null}}</td>
                  <td>
                      <a href="{{route('adminRoleSinglePage',$role['id'])}}" class="link"><i class="fas fa-align-justify"></i></a>
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

    <div class="modal" id="createRole">
       <div class="modal-dialog">
          <div class="modal-content">
             <div class="modal-header">
                <h4 class="modal-title">Add Role</h4>
             </div>
             <div class="modal-body">
               <form action="{{route('adminCreateRole')}}" method="POST">
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

</script>
@stop
