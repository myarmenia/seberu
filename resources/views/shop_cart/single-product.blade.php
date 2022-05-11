@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('/css/singleproduct.css')}}">
@endsection
@section('singleproductparent')
@if($parents)
<span class="badge">
  <div class="row">
    <div class="col pt-2">

      <a href="{{route('categories',['id' =>$parents['parent_id']])}}">{{$parents['name']}}/</a>
    </div>
    @if($parents['parents'])

    <div class="col pt-2">
      <a href="{{route('categories',['id' =>$parents['parents']['parent_id']])}}">{{$parents['parents']['name']}}/</a>
    </div>
    @if($parents['parents']['parents'])
    <div class="col pt-2">
      <a href="{{route('categories',['id' =>$parents['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['name']}}/</a>
    </div>
    @if($parents['parents']['parents']['parents'])
    <div class="col pt-2">
      <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['name']}}/</a>
    </div>
    @if($parents['parents']['parents']['parents']['parents'])
    <div class="col pt-2">
      <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['parents']['name']}}/</a>
    </div>
    @endif
    @endif
    @endif
    @endif
  </div>
</span>
@endif
<div class="p-2 d-flex align-items-center single_name" style="height:60px">
    <h4  class="font-weight-bolder"> {{ $product->name}}</h4>
    <div class="d-flex align-items-center text-center mx-2">
        <img class="like_dislike mx-2" data-id = "{{ $product->id }}" src="{{ App\Models\Product::getLike($product->id) ? asset('img/like_image/like.png') : asset('img/like_image/dislike.png')}}" style="width:25px">
        <span>В избранное</span>
    </div>
</div>




@endsection


@section('content')



<div class="container-fluid ">

        <div class="row product_fitures">

            <div class="d-flex justify-content-center col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4 prodimg dd" style="height:500px">
                <div class="prod_small_img"style="height:500px;width:120px">
                    <div class="d-flex mt-3" style="height:100px;width:100px;background:#e2e2e2">
                        <img   src="{{route('getFile',['path' => $product->product_photos[1]->img_path ?: null])}}">
                    </div>
                    <div class="d-flex mt-3" style="height:100px;width:100px;background:#e2e2e2">
                        <img   src="{{route('getFile',['path' => $product->product_photos[2]->img_path ?: null])}}">
                    </div>
                </div>
                <div class="prodimg_div_img">
                    <img class="img-fluid"  src="{{route('getFile',['path' => $product->product_photos[0]->img_path ?: null])}}">
                </div>
            </div>
            <div class="col-12 col-sm-12 col-md-12  col-lg-6 col-xl-4  dd" >

                <h4 class="my-3 font-weight-bold">{{$product->name}}</h4>

                <div class="d-flex flex-column-reverse product_charact">
                    @foreach ($product->category->characts as $item )

                            @if ($item->name!='Цвет')
                                <div class="row">
                                    @foreach ( $product['product_chars'] as $key)
                                        @if ($key->pivot->chars_id == $item->id)
                                        <div class="col-8 mt-1">{{$item->name}}</div>

                                        <div class="col-4 mt-1">{{$key->pivot->value }}</div>


                                        @endif
                                    @endforeach

                                </div>

                            @else

                                <div class="my-5">
                                    <h3 id="col"> {{$item->name}}</h3>
                                    <div  class="d-flex" id="colors">

                                        @foreach ($color_char as $key)

                                            <div class="mr-2"  style="height:30px;width:30px;outline:1px solid black;background: {{$key}}"></div>
                                            <input type=checkbox class="mr-2 mt-2 color" value = "{{$key}}">
                                        @endforeach
                                    </div>
                                    <button class="py-3 px-4 text-white button_description ">Перейти к описанию</button>
                                </div>
                            @endif
                    @endforeach

                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4 dd">
                <div class="d-flex justify-content-center">
                    <div  class="my-5 price-section-border">
                        <div>
                            <div  class="my-5 price_section"><h2 class='font-weight-bold'>{{$product->price}} Р.</h2></div>
                            <div class="my-5 price_section">
                                <h5>Выберите город доставки:</h5>
                                <select class="mx-2">
                                    <option>Москва</option>
                                    <option>italy</option>
                                </select>
                            </div>
                            <div class="my-3 price_section">
                                <h5>Выберите способ доставки:</h5>
                                <select class="mx-2">
                                    <option>СДЭК</option>
                                    <option>italy</option>
                                </select>
                            </div>
                            <div class="my-5 price_button_section">
                                <button class="m-2  py-1 px-3 text-white button_description">Купить</button>
                                <form  method="post">
                                    @csrf

                                    <button class="m-2  py-1 px-3 text-white button_description addToCart" data-attribute="{{$product->id}}">В корзину</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="product_fitures">

                <h3>Описание</h3>
                <div>
                    {{$product->description}}
                </div>

        </div>
        <div>
            <h4 class="text-center my-4">Похожие товары</h4>
            <div class="row d-flex justify-content-center">

                    @foreach($like_product as $item)

                        <div class="d-flex justify-content-center col-12  col-sm-6 col-md-4 col-lg-2 col-xl-2">

                            <div  class="same_product">
                                <div class="d-flex justify-content-center product_item_div">

                                    <img  src="{{route('getFile',['path' => $item->product_photos[0]['img_path'] ?: null])}}">
                                    <img class="like_dislike" data-id = "{{ $item->id }}" src="{{ App\Models\Product::getLike($item->id) ? asset('img/like_image/like.png') : asset('img/like_image/dislike.png')}}" style="height:20px;width:20px;position:absolute;left:80%">

                                </div>
                                <div class="d-flex justify-content-center mt-3"> <h4 class="text-center">{{$item->price}}  </h4><h4>р.</h4></div>
                                <div style="height:50px;overflow-y:auto"> <h6 class="text-center">{{$item->name}}</h6></div>
                                <div class="d-flex justify-content-center my-2 ">
                                    <form  method="post">
                                        @csrf
                                        <button class="m-2  py-1 px-3 text-white button_description addToCart" data-attribute="{{$product->id}}">В корзину</button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    @endforeach
                    <input id='like' value="{{asset('img/like_image/like.png')}}" type='hidden'>
                    <input id='dislike' value="{{asset('img/like_image/dislike.png')}}" type='hidden'>
            </div>
        </div>
        <div>
            <h4 class="text-center my-4">Популярные товары</h4>
            <div class="row d-flex justify-content-center">

                    @foreach($best_seller as $item)

                        <div class="d-flex justify-content-center col-12  col-sm-6 col-md-4 col-lg-2 col-xl-2">

                            <div class='m-2' style="height:400px;width:200px">
                                <div class="d-flex justify-content-center product_item_div">

                                    <img  src="{{route('getFile',['path' => App\Models\Product::find($item['prod_id'])->product_photos[0]->img_path ?: null])}}">
                                    <img class="like_dislike" data-id = "{{ $item['prod_id'] }}" src="{{ App\Models\Product::getLike($item['prod_id']) ? asset('img/like_image/like.png') : asset('img/like_image/dislike.png')}}" style="height:20px;width:20px;position:absolute;left:80%">

                                </div>
                                <div class="d-flex justify-content-center mt-3"> <h4 class="text-center">{{App\Models\Product::find($item['prod_id'])->price}}  </h4><h4>р.</h4></div>
                                <div style="height:50px;overflow-y:auto"> <h6 class="text-center">{{App\Models\Product::find($item['prod_id'])->name}}</h6></div>
                                <div class="d-flex justify-content-center my-2 "> <button class="m-2  py-1 px-3 text-white button_description addToCart">В корзину</button></div>
                            </div>
                        </div>

                    @endforeach
                    <input id='like' value="{{asset('img/like_image/like.png')}}" type='hidden'>
                    <input id='dislike' value="{{asset('img/like_image/dislike.png')}}" type='hidden'>
            </div>
        </div>
</div>


@endsection

@section('script')
    <script src="{{asset('js/single_product.js')}}"></script>
@endsection



