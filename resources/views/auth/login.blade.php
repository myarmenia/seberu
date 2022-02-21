<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/log_in_mod.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
    Launch static backdrop modal
  </button>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Вход</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <!-- <div class="login-left">
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <input class="seven" type="text" id='icon' placeholder="Введите email или телефон*" />
                <div class="clearfix"></div>
            </div> -->
            <div class="input-group mb-3">
                <input type="text" class=" psw form-control" placeholder="Введите email или телефон*" aria-label="Recipient's username"
                  aria-describedby="basic-addon2">
              </div>
            <div class="input-group mb-3">
                <input type="text" class=" psw form-control  icn" placeholder="Повторите пороль*"
                  aria-label="Recipient's username" aria-describedby="basic-addon2">
                <span class="input-group-text" id="basic-addon2"><img src="../images/password.png"></span>
              </div>
            <!-- <div class="login-right">
                <div class="clearfix"></div>
                <div class="clearfix"></div>
                <input class="seven" type="text" id='icon' placeholder="Повторите пароль*" />
                <span for='icon' class="p-viewer">
                    <i class="fa fa-eye" aria-hidden="true"></i>
                </span>
                <div class="clearfix"></div>
                <br/> -->
            <div class="check">
                <input type="checkbox" id="ve" name="remember" {{ old('remember') ? 'checked' : '' }}><label id="check1" for="vehicle1">Запомнить</label>

            </div>
            <div id="inpg">Вход</div>
            @if (Route::has('password.request'))
                                    <a id="end" href="{{ route('password.request') }}">
                                        Восстановить пароль
                                    </a>
                                @endif

          </div>

        </div>
        </div>

      </div>
    </div>
  </div>
</body>
</html>
