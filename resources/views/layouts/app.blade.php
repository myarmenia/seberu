<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <link rel="stylesheet" href="{{asset('css/reg_mod.css')}}">
  <link rel="stylesheet" href="{{asset('css/katalog.css')}}">
  
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
  integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
  integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
  crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
  crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>


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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{asset('/css/singleproduct.css')}}">

 @yield('style')
</head>
<body>
  <header>
    <section class="w-100">
    <div id="cont" class="container d-flex">

      <div class="logo">
        <img id="logo" src="{{asset('storage/main-images/logo.png')}}">
      </div>
      <div class="filter-div">
        <div class="kat">
          <button type="button" class="btn1"  autocomplete="off">
            <div id="icn">
            <i class="material-icons" id="icons"
            style="font-size:40px; position: relative; left: 1px">clear</i>
            <img src="{{asset('storage/main-images/Group 1 (1).png')}}" id="menu_img"></div>
            <div class="catalog">Каталог</div></button>
        </div>

        <div id="inp-gr" class="input-group">
          <button class="btn btn-outline-secondary dropdown-toggle т1" type="button" data-bs-toggle="dropdown"
            aria-expanded="false">Что искать?</button>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action before</a></li>
            <li><a class="dropdown-item" href="#">Another action before</a></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li><a class="dropdown-item" href="#">Separated link</a></li>
          </ul>
          <input type="text" class="form-control ipt" placeholder="Введите название товара"
            aria-label="Text input with 2 dropdown buttons">
          <button type="button" data-bs-toggle="dropdown" aria-expanded="false">Поиск</button>
          <ul class="dropdown-menu dropdown-menu-end">

          </ul>
        </div>
        <div class="fnc">
          <div class="icns"><img src="{{asset('storage/main-images/orders.png')}}" style="height: 25px;margin-top: 5px;"><br />Заказы</div>
          <div class="icns"><i class="fa fa-shopping-basket" style="font-size: 25px;color: grey;margin-top: 3px;"></i><br />Корзина</div>
          <div class="icns">
            @if(Auth::check())
              <form class="" action="{{route('logout')}}" method="post">
                @csrf
                  <input type="submit" name="" value="Logout">
              </form>
            @else
            <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#exampleModal" style="height: 48px; width: 77px;">
            <img src="{{asset('storage/main-images/user.png')}}" style="height:20px"><br />
            Вход
            </button>
            @endif
        </div>
        </div>
      </div>
    </div>
    <div class="cat_icon"><i class="fa fa-bars" style="font-size:36px"></i></div>
  </section>

  <section>
    <div class="container d-flex " id="hed1">
      <div>Товары</div>
      <div>Услуги и развличения</div>
      <div>Отдых</div>
      <div>Культура</div>
      <div>Отдахни в СЕБЕ!</div>
    </div>
  </section>

  <div class="cont_lg">
        <div id="coteg">
            @foreach ($categoris as $item)
                <p onclick="categoriesGet('{{ $item->id }}')">
                    {{ $item->name }}
                </p>
            @endforeach
        </div>
            <div class="cont"></div>
        </div>
  </div>

  </header>
  <section class="w-100">
    @yield('content')
  </section>

  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
  aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Вход</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <input type="text" class=" psw form-control" placeholder="Введите email или телефон*"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <div class="input-group mb-3">
          <input type="text" class=" psw form-control  icn" placeholder="Введите пороль*"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
          <span class="input-group-text" id="basic-addon2"><img src="../images/password.png"></span>
        </div>

        <div class="check">
          <input type="checkbox" id="ve" name="vehi"><label id="check1" for="vehicle1">Запомнить</label>

        </div>
        <div id="inpg">Войти</div>
        <div id="end"><i>Восстановить пароль</i></div>
      </div>

    </div>
  </div>

</div>

</div>
</div>
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Large modal</button> -->
<div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true"
  role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="w-100 modal-title h4 text-center" id="exampleModalLabel">Вход</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <div class="input-group mb-3">
          <input type="text" class=" psw form-control" placeholder="Введите email или телефон*"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
        </div>
        <div class="input-group mb-3">
          <input type="text" class=" psw form-control  icn" placeholder="Введите пороль*"
            aria-label="Recipient's username" aria-describedby="basic-addon2">
          <span class="input-group-text" id="basic-addon2"><img src="../images/password.png"></span>
        </div>

        <div class="check">
          <input type="checkbox" id="ve" name="vehi"><label id="check1" for="vehicle1">Запомнить</label>

        </div>
        <div id="inpg">Войти</div>
        <div id="end"><i>Восстановить пароль</i></div>
        <div data-bs-dismiss="modal" aria-label="Close"><u><button type="button" id="endd" class="btn btn-light"
              data-bs-toggle="modal" data-bs-target="#exampleModalXl">Если у Вас еще нет аккаунта пройдите
              регистрацию</button></u></div>
      </div>

    </div>
  </div>
</div>
</div>

<!-- <modal> -->
    <section>
        <div class="all_modals">
          <div class="modal fade show" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-modal="true" role="dialog" >
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf

                  <h5 class="w-100 modal-title h4 text-center" id="exampleModalLabel">Вход</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                  <div class="input-group mb-3">
                    <input type="text" class=" psw form-control @error('email') @error('login_error') is-invalid  @enderror @enderror" placeholder="Введите email или телефон*" aria-label="Recipient's username"
                      aria-describedby="basic-addon2" name="email" >
                      @error('login_error')
                      @error('email')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                      @enderror
                  </div>
                <div class="input-group mb-3">
                    <input type="password" class="hideShowEye1 psw form-control  icn @error('password') @error('login_error') is-invalid @enderror @enderror" placeholder="Введите пороль*"
                      aria-label="Recipient's username" aria-describedby="basic-addon2" name="password">
                    <span class="input-group-text" id="basic-addon2" onclick="hideShowEye('hideShowEye1')"><img src="{{asset('storage/main-images/password.png')}}"></span>
                    @error('login_error')
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    @enderror
                  </div>

                  <div class="check">
                      <input type="checkbox" id="ve" name="remember" {{ old('remember') ? 'checked' : '' }}><label id="check1" for="vehicle1">Запомнить</label>

                  </div>

                  @if (Route::has('password.request'))
                                          <a id="end" href="{{ route('password.request') }}">
                                              Восстановить пароль
                                          </a>
                                      @endif
                <button id="inpg">Войти</button>

                <div  data-bs-dismiss="modal" aria-label="Close" ><u><button type="button" id="endd" class="btn btn-light" data-bs-toggle="modal" data-bs-target=
                  "#exampleModalXl">Если у Вас еще нет аккаунта пройдите регистрацию</button></u></div>
              </div>
              </form>

                </div>
              </div>
            </div>
            <div class="modal fade show" id="exampleModalXl" tabindex="-1" aria-labelledby="exampleModalXlLabel" aria-modal="true"
              role="dialog">

              <div class="modal-dialog modal-xl">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div id="header" class="modal-header">
                      <h5 class="modal-title" id="staticBackdropLabel">Добро пожаловать!</h5>
                      <button type="button" class="btn-close kk" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form class="" action="{{route('register')}}" method="post">
                      @csrf

                    <div class="modal-body">
                      <div class="input-group mb-3">
                        <input type="text" class="@error('register_error') @error('email') is-invalid @enderror @enderror psw form-control" placeholder="Введите ваш email*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="email">
                          @error('register_error')
                          @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                          @enderror
                      </div>
                      <!-- <div class="input-group mb-3">
                        <input type="text" class=" psw form-control" placeholder="Введите ваш телефон*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2">
                      </div> -->
                      <div class="input-group mb-3">
                        <input type="text" class="@error('name') is-invalid @enderror psw form-control" placeholder="Имя*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="name">
                          @error('name')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="@error('surname') is-invalid @enderror psw form-control" placeholder="Фамилия*" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="surname">
                          @error('surname')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>
                      <div class="input-group mb-3">
                        <input type="text" class="@error('patronymic') is-invalid @enderror psw form-control" placeholder="Отчество" aria-label="Recipient's username"
                          aria-describedby="basic-addon2" name="patronymic">
                          @error('patronymic')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                      </div>


                      <div class="input-group mb-3">
                        <input type="password" class="hideShowEye2 @error('register_error') @error('password') is-invalid @enderror @enderror psw form-control icn" placeholder="Введите пороль*"
                          aria-label="Recipient's username" aria-describedby="basic-addon2" name="password">
                        <span class="input-group-text" id="basic-addon2" onclick="hideShowEye('hideShowEye2')"><img src="{{asset('storage/main-images/password.png')}}"></span>
                        @error('register_error')
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        @enderror
                      </div>


                       <div class="input-group mb-3">
                         <input type="password" class=" psw form-control  icn" placeholder="Повторите пороль*"
                           aria-label="Recipient's username" aria-describedby="basic-addon2" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                       </div>


                      <div id="sel">Я представитель юр. лица/ИП <span id="sp" class="glyphicon glyphicon-play sp"></span></div>
                      <div id="rbs">

                        <input type="radio" id="r1" data-name="ip" name="gender" class="radio">
                        <label for="r1" class="r2">Индивидуальный предприниматель</label>
                        <br />

                        <div class="addRegForm">

                        </div>
                        <input type="radio" id="r2" data-name="yl" class="r2" name="gender" class="radio">
                        <label for="r2" class="r2">Юридическое лицо</label>

                        <button id="inpg" type="submit">Зарегистрироваться</button>
                        <div id="end">Нажимая кнопку ЗАРЕГИСТРИРОВАТЬСЯ, я потверждаю свою дееспособность,
                          ознакомление с правилами сервиса(сайта)
                          и даю согласие на обработку своих персональных данных
                        </div>
                      </div>


                    </div>
                    </form>

                  </div>
                </div>
              </div>
              </div>
        </div>
      </section>
   {{-- modelEnd --}}

  <script src="{{asset('js/main.js')}}"></script>
  <script src="{{asset('js/reg_mod.js')}}"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <script>

    @error('login_error')
    $(window).on('load', function () {
            $('#exampleModal').modal('show');
        });
    @enderror

    @error('register_error')
    $(window).on('load', function () {
              $('#exampleModalXl').modal('show');
        });
    @enderror


    function hideShowEye(cl){

      let atType = 'password';
      atType = $('.' + cl).attr('type') == 'password' ? 'text' : 'password';
      $('.' + cl).attr('type',atType);

    }

const tabItems = Array.from(document.querySelectorAll('.tab-item'))
const contentItems = Array.from(document.querySelectorAll('.content-item'))

const clearActiveClass = (element, className = 'is-active') => {
  element.find(item => item.classList.remove(`${ className }`))
}

const setActiveClass = (element, index, className = 'is-active') => {
  element[index].classList.add(`${ className }`)
}

const checkoutTabs = (item, index) => {
  item.addEventListener('click', () => {

    if (item.classList.contains('is-active')) return
    console.log(item)

    clearActiveClass(tabItems)
    clearActiveClass(contentItems)

    setActiveClass(tabItems, index)
    setActiveClass(contentItems, index)
  })
}

tabItems.forEach(checkoutTabs)



       function categoriesGet(id){
        $('.cont').html('')
        var cat_id = id;

           $.ajax({
               url: "{{route('getCats')}}",
               type: "GET",
               data: {
                   cat_id: cat_id
               },
               success: function(data) {
                let p=0
                for (const item of data.datas){
                    p++
                    $('.cont').append(`<div class="sub_coteg p`+p+`"><h3 class="h3">${item.name}</h3></div>`);

                       for(const item1 of item.child){

                            $('.p'+p).append(`<p>${item1.name}</p>`);
                        }

                   }
               }


           })
       }

  </script>
  @yield('script')
</body>

</html>
