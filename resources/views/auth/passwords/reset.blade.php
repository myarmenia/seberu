

@extends('layouts.app')

@section('title')
    Reset
@endsection
<style>
    .modal-content{
    background-color: #fefefe;
    margin: 10% auto !important;
    padding: 20px;
    border: 1px solid #888;
    width: 721.27px;
    height: 352px !important;
    border-radius: 20px;
    }
    .form_input{
        width: 298px;
        height: 39px;
    }
   .offset-md-4 {
    margin-left: 27.333333% !important;
   }
</style>
@section('style')
<link rel="stylesheet" href=" {{mix ('css/app.css')}}">
<link rel="stylesheet" href=" {{asset('css/user-profile.css')}}">
@endsection

@section('content')

{{-- <div class="card">
  <div class="card-body">
    <form method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn1 btn-flat">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>

  </div>
</div> --}}
@include('footer-page.footer')
{{-- modal --}}
<button class="modal_button" id="myBtn" style="display:none;">Изменить пароль</button>
<div id="myModal" class="modal">
    <div class="modal-content">
      <span class="close">&times;</span>
      <p style="color:black;font-weight: bold;">Восстановить пароль</p>
      <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="row mb-3 text-center12">
            <div class="col-md-6 ">
                <input id="email" type="email" class="form_input" placeholder="Введите email*"  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 text-center12">
            <div class="col-md-6">
                <input id="password" type="password"  class="form_input" placeholder="Введите пароль*"  @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="row mb-3 text-center12">
            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form_input" placeholder="Подтвердить пароль*" name="password_confirmation" required autocomplete="new-password">
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn1 btn-flat"style="width: 296px !important;">
                    {{ __('Восстановить') }}
                </button>
            </div>
        </div>
    </form>
    </div>
  </div>
  {{-- endmodal --}}
  <script>
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
modal.style.display = "block";
}

span.onclick = function() {
modal.style.display = "none";
}

window.onload = function() {
  modal.style.display = "block";
}
</script>
@endsection
