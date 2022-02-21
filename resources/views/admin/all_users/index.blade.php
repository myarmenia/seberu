@extends('adminlte::page')
@section('title', 'All Users')
@section('content_header')

@stop

@section('content')
<section class="content">
      <div id="tamanho" class="row">
        <div id="tamanho" class="col-12">

          <div id="tamanho" class="card">
            <div id="tamanho" class="card-header">
              <h3 class="card-title">Tabela de Clientes</h3>
            </div>

            <div id="tamanho" class="card-body">
              <table id="example1 tabelinha" class="table table-bordered table-striped" >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Name</th>
                    <th>Surname</th>
                    <th>Patronymic</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
                </thead>
                <tbody>
                  @if($users)
                  @foreach($users as $user)
                <tr>
                  <td>{{$user['id'] ?? null}}</td>
                  <td>{{$user['email'] ?? null}}</td>
                  <td>{{$user['name'] ?? null}}</td>
                  <td>{{$user['surname'] ?? null}}</td>
                  <td>{{$user['patronymic'] ?? null}}</td>
                  <td>{{$user['phone'] ?? null}}</td>
                  <td>
                    @can('edit_user')
                        <a href="{{route('adminUserSinglePage',$user['id'])}}" class="link"><i class="fas fa-align-justify"></i></a>
                    @endcan
                    <div class="">
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
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>

</script>
@stop
