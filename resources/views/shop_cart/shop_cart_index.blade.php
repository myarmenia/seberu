@extends('layouts.app')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css" media="all" />
@section('style')
<link rel="stylesheet" href="{{asset('/css/shop_cart.css')}}">
@endsection
@section('content')
<main class="content">
    <section class="main-content main-content-border-left">
        <div class=" d-flex justify-content-center mt-50 mb-50">
            <div class="">

                @foreach ($Product as $myProduct )
                    <div class=" card-body mt-3">
                        <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                            <div class="mr-2 mb-3 mb-lg-0"> <img src="https://i.imgur.com/Aj0L4Wa.jpg" width="150" height="150" alt=""> </div>
                            <div class="media-body">
                                <h6 class="media-title font-weight-semibold"><a href="#" data-abc="true" style="font-weight:bold;color:black">Смартфон Sumsung Galaxy M20 </a> </h6>
                                {{-- <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                    <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                                </ul> --}}
                                <p class="mb-3"> Диагональ экрана, дюймы:5.45</p>
                                <p class="mb-3"> Оперативная память:  2ГБ</p>
                                <p class="mb-3"> Встроенная память: 16 ГБ</p>
                                <p class="mb-3"> Разрешение основной камеры, Мпикс: 13</p>
                                <p class="mb-3"> Процессор: MT6739 (4 ядра), 1.5 ГГц</p>
                            </div>
                            <div class="mt-3 mt-lg-0 ml-lg-3 text-center">
                                <h3 class="mb-0 font-weight-semibold" style="color:red;">35 000 Р.</h3>
                                <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                <div class="text-muted">2349 reviews</div><button  class="new_one  mt-4 "><i class="icon-cart-add mr-2"></i> Add to cart</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
            </div>
        </div>
    </section>
    <section class="sub-content">
        <div class="profile_user">
          <p class="main-para category_name">

              @if(isset($categoris_show->parent))
              @if(isset($categoris_show->parent->parent))
              {{$categoris_show->parent->parent['name']}}/
              @endif
              {{$categoris_show->parent['name']}}/
              @endif
              {{$categoris_show['name']}}
          </p>
        </div>
        <p class="main">
            @if(isset($categoris_show->parent))
            @if(isset($categoris_show->parent->parent))
             {{$categoris_show->parent->parent['name']}}<br>
            @endif
            {{$categoris_show->parent['name']}}<br>
            @endif
            {{$categoris_show['name']}}
        </p>
        <p class="main-style">Цена</p>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                      <div id="slider-range" class="price-filter-range" name="rangeInput"></div>

                      <div style="margin:0px auto">
                          <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                          <input type="number" min=0 max="10000" oninput="validity.valid||(value='10000');" id="max_price" class="price-range-field" />
                      </div>

                      <button class="price-range-search" id="price-range-submit">Search</button>
                      <div id="searchResults" class="search-results-block"></div>
                  </div>
              </div>
            </div>
        <p class="main-para">Бренды</p>
        <ul class="main main main_ne">
            <div>
                <input type="checkbox" id="scales" name="scales">
                <label for="scales">Scales</label>
            </div>
        </ul>
        <p class="main-para dropdown-toggle">Показать еще</p>
        <ul class="main dropdown">

                <label class="toggleSwitch" onclick="">
                    <input type="checkbox" />
                    <span>Новинки</span>
                    <a></a>
                </label><br><br>


            <label class="toggleSwitch" onclick="">
                <input type="checkbox" />
                <span>Товары со скидкой</span>
                <a></a>
            </label><br><br>
            <label class="toggleSwitch" onclick="">
                <input type="checkbox" />
                <span>Наборы</span>
                <a></a>
            </label>
        </ul>
      </section>
</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/side_bar.js')}}"></script>
<script>

$("#slider-range,#price-range-submit").on("click", function () {
var min_price = $('#min_price').val();
var max_price = $('#max_price').val();
$.get(
    "{{route('searchprice')}}",
    {min_price,max_price},
    function (result) {
    //   $("#searchResults").html(result);
    }
)
});
</script>
@endsection


