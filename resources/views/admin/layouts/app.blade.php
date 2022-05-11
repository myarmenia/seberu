<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script> --}}
      @yield('style')


        <script src="script.js"></script>
  </head>
  <body>
    <div class="container">

      @yield('content')
    </div>

  </body>
  @yield('script')
</html>
