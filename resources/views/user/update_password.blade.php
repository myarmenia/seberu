@extends('layouts.app')

@section('content')

<main class="content">
    <section class="main-content" style="margin: 40px 0 0 0;">
        <form action="{{ route('password.email') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Адрес электронной почты') }}</label>
                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <a href="/profile"><button type="submit" class="back-button" class="btn btn-primary"><i class="fa fa-arrow-left" style="margin:0 20px 0 0" aria-hidden="true"></i>Назад</button></a>
            </div>
        </div>

    </section>
    @include('User.sidebar_menu')
</main>
@include('footer-page.footer')
@endsection
