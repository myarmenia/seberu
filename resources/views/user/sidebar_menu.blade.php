
@section('style')
 <link rel="stylesheet" href="{{asset('css/user-profile.css')}}">
@endsection

<main class="content">
  <section class="sub-content">
    <div class="profile_user">
        <div class="img_sidebar">
            <img src="/storage/main-images/{{Auth::user()->image}}" style="width: 100%;">
        </div>
        <p class="main-para user_name" style="text-transform: uppercase;">{{Auth::user()->name}}</p>
    </div>
    <hr>
    <p class="main-para">Мой кабинет</p>
    <p class="main-para dropdown-toggle">Заказы</p>
    <ul class="main dropdown">
      <a href=""><li>Активные заказы</li></a>
      <a href=""><li>Все заказы</li></a>
      <a href=""><li>История покупок</li></a>
      <a href=""><li>Отзывы</li></a>
    </ul>
    <p class="main-para dropdown-toggle">Товары</p>
    <ul class="main main dropdown">
      <a href=""><li>Корзина</li></a>
      <a href=""><li>Избранное</li></a>
    </ul>
    <p class="main-para dropdown-toggle">Сервисное обслуживание</p>
    <ul class="main dropdown">
      <a href=""><li>Обмен и возврат</li></a>
      <a href=""><li>Возврат денежных средств</li></a>
      <a href=""><li>Мои обращения</li></a>
    </ul>
    <p class="main-para dropdown-toggle">Профиль</p>
    <ul class="main dropdown">
      <a href="{{route('profile')}}"><li  class="{{ request()->routeIs('profile*','edit_show*','update_pass*') ? 'active' : '' }}">Личные данные</li></a>
      <a href="#"><li class="{{ request()->routeIs('myorganization*') ? 'active' : '' }}">Мои организации</li></a>
      @if(Auth::User()->organization_name)
       <a href="{{route('myorganization')}}"><li class="{{ request()->routeIs('myorganization*') ? 'active1' : '' }}">Название организации:{{Auth::User()->organization_name}}</li></a>
      @else
       <a href="{{route('myorganization')}}"><li class="{{ request()->routeIs('myorganization*') ? 'active1' : '' }}">+Добавить организацию</li></a>
      @endif

    </ul>
  </section>
</main>
<script>
    $(function() {
       {$('.dropdown').slideUp(); }
       $('.dropdown-toggle').css("font-weight", "500").click(function() { $(this).next('.dropdown').slideToggle();
    });

   $(document).click(function(e){
      var target = e.target;
        if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle'))
        {$('.dropdown').slideUp(); }
    });
    });
</script>



