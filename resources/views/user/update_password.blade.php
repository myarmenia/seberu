@extends('layouts.app')
@section('content')
<style>
    .modal-content{
    background-color: #fefefe;
    margin: 15% auto;
    padding: 20px;
    border: 1px solid #888;
    width: 721.27px;
    height: 360px;
    border-radius: 20px;
    }
    .form_input{
        width: 298px;
        height: 39px;
    }
   .offset-md-4 {
    margin-left: 26.333333%;
   }
</style>
<main class="content">
    <section class="main-content">
        <div class="content1">
           <div class="img">
              <img src="/storage/main-images/{{Auth::user()->image}}" style="width: 100%;">
            </div>
        </div>
    </section>
    <section class="main-content2">
        <div class="content1">
            <button class="modal_button" id="myBtn">Изменить пароль</button>
            <a>
                @if(Auth::check())
                    <form class="" action="{{route('logout')}}" method="post">
                    @csrf
                    <button style="border:none; background-color:#fff;"><span>Выход из личного кабинета</span></button>
                    </form>
                @endif
            </a>
            <a href=""><span>Удалить аккаунт </span></a>
        </div>
    </section>
    <section class="main-content main-content-border-left">
        <div class="content1">
            <span>Имя</span>
            <span class="profile_name">{{Auth::user()->name}}</span>

        </div>
        <div class="content1">
            <span>Фамилия</span>
            <span class="profile_name">{{Auth::user()->surname}}</span>
        </div>
        <div class="content1">
            <span>Отчество</span>
            <span class="profile_name">{{Auth::user()->patronymic}}</span>
        </div>
        <div class="content1">
            <span>Эл. адрес</span>
            <span class="profile_name">{{Auth::user()->email}}</span>
        </div>
        <div class="content1">
            <span>Tелефон</span>
            <span class="profile_name">{{Auth::user()->phone}}</span>
        </div>
        <a href="{{route('edit_show')}}"><button class="add-button">Редактировать</button></a>
    </section>
    @include('User.sidebar_menu')
</main>
@include('footer-page.footer')

{{-- modal --}}
<div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p style="color:black;font-weight: bold;">Восстановить пароль</p>
      <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="row mb-3 text-center12">
            <div class="col-md-6">
                <input id="email" type="email" class="new_input" @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" placeholder="Введите email*" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button class="add-button">Обновить пароль</button>
            </div>
        </div>
    </form>
    </div>
  </div>
  {{-- endmodal --}}
  <script>
      // Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onload = function() {
    modal.style.display = "block";
}
  </script>
@endsection


