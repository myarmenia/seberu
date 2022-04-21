@extends('layouts.app')

@section('content')

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
            <a href="{{route('update_pass')}}"><span>Изменить пароль</span></a>
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
@endsection


