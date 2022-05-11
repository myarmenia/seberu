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
               @foreach ($Product as $myProduct)
                <div class=" filter_show card-body mt-3">
                    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
                           <div class="mr-2 mb-3 mb-lg-0"> <img src="@if(isset($myProduct['product_photos']) && isset($myProduct['product_photos'][0])) {{route('getFile',['path' => $myProduct['product_photos'][0]['img_path']])}} @endif" width="150" height="150" alt=""> </div>
                        <div class="media-body">
                            <h6 class="media-title font-weight-semibold" style="text-align:inherit;"><a href="#" data-abc="true" style="font-weight:bold;color:black;">{{$myProduct->name}} {{$myProduct['product_chars'][1]['pivot']['value']}}</a> </h6>
                             {{-- <ul class="list-inline list-inline-dotted mb-3 mb-lg-2">
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Phones</a></li>
                                <li class="list-inline-item"><a href="#" class="text-muted" data-abc="true">Mobiles</a></li>
                            </ul> --}}
                                 @if ($myProduct['product_chars'][4]['name'])
                                 <p class="mb-3">{{$myProduct['product_chars'][4]['name']}}:{{$myProduct['product_chars'][4]['pivot']['value']}}</p>
                                @endif
                                @if ($myProduct['product_chars'][5]['name'])
                                <p class="mb-3">{{$myProduct['product_chars'][5]['name']}}:{{$myProduct['product_chars'][5]['pivot']['value']}}</p>
                                @endif
                                @if ($myProduct['product_chars'][6]['name'])
                                <p class="mb-3">{{$myProduct['product_chars'][6]['name']}}:{{$myProduct['product_chars'][6]['pivot']['value']}}</p>
                                @endif
                                @if ($myProduct['product_chars'][7]['name'])
                                <p class="mb-3">{{$myProduct['product_chars'][7]['name']}}:{{$myProduct['product_chars'][7]['pivot']['value']}}</p>
                                @endif
                                @if ($myProduct['product_chars'][8]['name'])
                                <p class="mb-3">{{$myProduct['product_chars'][8]['name']}}:{{$myProduct['product_chars'][8]['pivot']['value']}}</p>
                                @endif
                        </div>
                        <div class="mt-3 mt-lg-0 ml-lg-3 text-center respncive">
                            <h3 class="mb-0 font-weight-semibold" style="color:red;">{{$myProduct->sale_price}} Р.</h3>
                            <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                            <div class="text-muted">2349 reviews</div><button  class="new_one  mt-4 "><i class="icon-cart-add mr-2"></i> Add to cart</button>
                        </div>
                    </div>
                </div>
                {{-- <hr> --}}
                <div id="searchResults" class="search-results-block mt-3"></div>
                <div id="searchResults12" class="search-results-block mt-3"></div>
                <div id="searchResults13" class="search-results-block mt-3"></div>
                <div id="searchResults14" class="search-results-block mt-3"></div>
                @endforeach
            </div>
        </div>
    </section>
    <section class="sub-content sideNav">
        <i class="fa fa-close close_close nav-toggle"></i>
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
                <div class="row row12">
                    <div class="col-md-12">
                      <div id="slider-range" class="price-filter-range" name="rangeInput"></div>
                      <div style="margin:0px auto">
                          <input type="number" min=0 max="9900" oninput="validity.valid||(value='0');" id="min_price" class="price-range-field" />
                          <input type="number" min=0 max="15000" oninput="validity.valid||(value='15000');" id="max_price" class="price-range-field" />
                      </div>
                      <button class="price-range-search" id="price-range-submit">Search</button>
                  </div>
              </div>
            </div>
             <p class="main-para new_main">Бренды</p>
            @if (!empty($product_filter))
                @foreach ($product_filter as $side_item)
                <div>
                    <input type="checkbox" class="checkbox"   value="{{$side_item->name}}" id="brande_filter">
                    <label for="scales">
                        <div>
                            <p class="main-para new_main">{{$side_item->name}}</p>
                        </div>
                    </label>
                </div>
                @endforeach
            @endif

            <p class="main-para new_main">Размер</p>
            @foreach ($Product1 as $item_chars)
                <div>
                    <input type="checkbox" class="checkbox1" value="{{$item_chars->product_id}}" id="scales" name="scales">
                    <label for="scales">
                        <div>
                            <p class="main-para new_main">{{$item_chars->value}}</p>

                        </div>
                    </label>
                </div>
            @endforeach
            <p class="main-para new_main">Модел</p>
            @foreach ($Product2 as $item_chars)
                <div>
                    {{-- <input type="checkbox" class="checkbox2"   value="{{$item_chars->value}}" > --}}
                    <input type="checkbox" class="checkbox2" value="{{$item_chars->product_id}}" id="scales" name="scales">
                    <label for="scales">
                        <div>
                            <p class="main-para new_main">{{$item_chars->value}}</p>

                        </div>
                    </label>
                </div>
            @endforeach
            <p class="main-para new_main">Цвет</p>
            @foreach ($Product3 as $item_chars)
            <div class="all_color">
                <input type="checkbox" id="scales" name="scales">
                <div class="color_div">
                <label for="scales" class="product_color">
                    <div  style="width: 20px; height: 20px; background:{{$item_chars->value}}"></div>
                    <div class="main-para">{{$item_chars->value}}</div>
                </div>
                </label>
            </div>
            @endforeach
      </section>

</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="{{asset('js/side_bar.js')}}"></script>
<script src="{{asset('js/filter_product.js')}}"></script>
@endsection


