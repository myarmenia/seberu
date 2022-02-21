@extends('adminlte::page')
@section('title', 'Roles')
@section('content_header')

@stop

@section('content')
<section class="content">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">{{$role['name']}}</h3>
      <div class="card-tools">
        <form class="" action="{{route('adminDeleteRole')}}" method="post">
            @method('delete')
            @csrf
            <input type="text" hidden name="id" value="{{$role['id']}}">
            <button type="submit" class="btn-xs btn-danger">
              <i class="fa-solid fa-trash"></i>
            </button>
        </form>
      </div>
    </div>
    <div class="card-body">
      Permissions
      <div class="col-sm-6">
        <div class="form-group">
          @if($perms)
          @foreach($perms as $key => $value)
          <div class="custom-control custom-checkbox">
            <input class="custom-control-input" @if($role->permissions->contains($value['id'])) checked @endif type="checkbox" id="customCheckbox{{$key}}"  value="{{$value['id']}}" onchange="addPerm(this.value)">
            <label for="customCheckbox{{$key}}" class="custom-control-label">{{$value['name']}}</label>
          </div>
          @endforeach
          @endif
        </div>
      </div>
    </div>
  </div>
</section>
@stop

@section('css')
<link rel="stylesheet" href=" {{mix ('css/app.css')}}">
@stop

@section('js')
<script>
function addPerm(val){
  $.ajax({
          url : '{{route('adminRolesAddPerm')}}',
          type : 'PATCH',
          data : {
            'perm_id':val,
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
</script>
@stop
