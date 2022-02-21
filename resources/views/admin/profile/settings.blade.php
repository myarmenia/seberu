@extends('adminlte::page')

@section('title', 'Admin Settings')

@section('content_header')

@stop

@section('content')
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">Profile</h3>
</div>


<form method="POST" action="{{route('adminUpdateData',Auth::user()->id)}}">
  @csrf
  @method('put')
<div class="card-body">
<div class="form-group">
<label >Name</label>
<input type="text" name="name" class="form-control" placeholder="{{Auth::user()['name']}}">
</div>
<div class="form-group">
<label >Surname</label>
<input type="text" name="surname" class="form-control" placeholder="{{Auth::user()['surname']}}">
</div>
<div class="form-group">
<label >Patronymic</label>
<input type="text" name="patronymic" class="form-control" placeholder="{{Auth::user()['patronymic']}}">
</div>
<div class="form-group">
<label >Phone</label>
<input type="number" name="phone" class="form-control" placeholder="{{Auth::user()['phone']}}">
</div>


<div class="form-group">
<label for="exampleInputFile">Profile image</label>
<div class="input-group">
<div class="custom-file">
<input type="file" name="profile_image" class="custom-file-input">
<label class="custom-file-label">Choose file</label>
</div>
</div>
</div>


<div class="card-footer">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
</form>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
