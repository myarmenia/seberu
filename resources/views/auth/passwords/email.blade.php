{{-- @extends('layouts.app') --}}
@include('layouts.app')
@section('content')
    <form action="{{ route('password.email') }}" method="post">
            @csrf

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

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn1 btn-flat">
                      <span class="fas fa-share-square"></span>
                      Password Reset
                  </button>
                </div>
            </div>

        </form>
  </div>
</div>

@include('footer-page.footer')
{{-- @endsection --}}
