@extends('adminlte::page')
@section('title', 'Single Page')
@section('content_header')

@stop

@section('content')
<section class="content">
  <div class="card card">
<div class="card-header">
<h3 class="card-title">User Settings</h3>
<div class="card-tools">
  @can('edit_user')
  <form class="" action="{{route('adminSpamUser')}}" method="POST">
    @csrf
    @method('patch')
    <input type="text" name="id" value="{{$user['id']}}" hidden>
  <button class="btn-sm bg-primary">
      <i class="fas fa-edit"></i>@if($user['status'])
      Un
      @endif
      Spam
  </button>
  </form>
  @endcan
</div>
</div>


<form>
<div class="card-body">
<div class="form-group">
<label >Name</label>
<input type="text" class="form-control" name="name"  value="{{$user['name']}}" onchange="editData(this.name,this.value)">
</div>
<div class="form-group">

<div class="input-group">

<div class="input-group-append">
</div>
</div>
</div>
@can('edit_user')
<div class="form-group">
<label>Roles</label>
@if($roles)
@foreach($roles as $num => $role)
  <div class="custom-control custom-switch">
    <input type="checkbox" @if($user->roles->contains($role['id'])) checked @endif class="custom-control-input" id="customSwitch{{$num}}" onChange="addRole({{$role['id']}})">
    <label class="custom-control-label" for="customSwitch{{$num}}">{{$role['name']}}</label>
  </div>
  @endforeach
  @endif
</div>
@endcan
<div class="form-check">

</div>
</div>
</form>
</div>
</section>
@stop

@section('css')

@stop

@section('js')
<script>
  function addRole(val){

    $.ajax({
            url : '{{route('adminAddRoleUser')}}',
            type : 'PATCH',
            data : {
              'role_id':val,
              'id':'{{request()->id }}',
              '_token':'{{ csrf_token() }}'
            },
            success : function(response) {
                console.log("Venue Successfully Patched!");
            },
            error : function(jqXHR, textStatus, errorThrown) {

            },
        });
  }

  function editData(name,value){

    $.ajax({
            url : '{{route('adminEditUserData')}}',
            type : 'PUT',
            contentType: "application/json",
            data : JSON.stringify({
              name:value,
              'id':'{{request()->id }}',
              '_token':'{{ csrf_token() }}'
            }),
            success : function(response) {
                console.log("Venue Successfully Patched!");
            },
            error : function(jqXHR, textStatus, errorThrown) {

            },
        });

  }
</script>
@stop
