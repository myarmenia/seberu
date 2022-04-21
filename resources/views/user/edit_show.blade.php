@extends('layouts.app')
@section('content')

<main class="content">
    <section class="main-content">
         @if (session('message'))
          <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close"></a> {{ session('message') }}</div>
         @endif
        <form action="{{route('store',Auth::user()->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
              <label for="exampleInputEmail1">Имя</label>
              <input type="text" name="name" class="form-control" id="exampleInputEmail1"  value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Фамилия</label>
              <input type="text" name="surname" class="form-control" id="exampleInputPassword1"  value="{{Auth::user()->surname}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Отчество</label>
                <input type="text" name="patronymic" class="form-control" id="exampleInputPassword1"  value="{{Auth::user()->patronymic}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Эл. адрес</label>
                <input type="text" name="email" class="form-control" id="exampleInputPassword1"  value="{{Auth::user()->email}}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">+ Добавить телефон</label>
                <input type="text" name="phone" class="form-control" id="exampleInputPassword1">
                <span style="color:red">@error('phone'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">изображение</label>
                <input  type="file" name="image"  class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" class="add-button" class="btn btn-primary">Добавлять</button>
          </form>
          <a href="/profile"><button type="submit" class="back-button" class="btn btn-primary"><i class="fa fa-arrow-left" style="margin:0 20px 0 0" aria-hidden="true"></i>Назад</button></a>
    </section>
    @include('User.sidebar_menu')
</main>
@include('footer-page.footer')
@endsection
