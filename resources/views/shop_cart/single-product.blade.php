@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('/css/singleproduct.css')}}">
@endsection



@section('content')



<div class="container-fluid" style="border:1px solid red">

    <div class="p-5 section">



        <div class="row px-5 product_fitures" style="border:1px solid green">

            <div class="d-flex justify-content-center col-12 col-sm-12 col-md-12 col-lg-12 col-xl-4" style="height:500px;border:1px solid blue;">
                <div style="height:500px;width:150px;border:1px solid green">
                    <div style="height:100px;width:100px;border:1px solid red">1111</div>
                </div>
                {{-- <div class="d-flex justify-content-center" style="height:400px;width:400px;margin:30px auto;border:1px solid red"> --}}


                        @foreach($product->product_photos as $key )
                                <img  id="img3" src="{{route('getFile',['path' => $key->img_path ?: null])}}">
                        @endforeach


                {{-- </div> --}}

            </div>
            <div class="col-12 col-sm-12 col-md-12  col-lg-6 col-xl-4" style="border:1px solid red">

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

                                            <div class="mr-2"  style="height:50px;width:50px;outline:1px solid black;background: {{$key}}"></div>
                                            <input type=checkbox class="mr-2 mt-3 color" value = "{{$key}}">
                                        @endforeach
                                    </div>
                                    <button class="py-3 px-4 text-white button_description ">Перейти к описанию</button>
                                </div>
                            @endif
                    @endforeach

                </div>

            </div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-4" style="border:1px solid red">
                <div class="d-flex justify-content-center ">
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
        <div class="p-5">
            <h3>Описание</h3>
            <div>
                {{$product->description}}
            </div>

        </div>
        <div class="p-5 same" style="border:1px solid">


            <h4 class="text-center">Похожие товары</h4>
            <div class="d-flex">

                    @foreach($like_product as $item)


                            <div class='m-2' style="height:400px;width:200px">
                                <div class="d-flex justify-content-center"  style="height:200px;width:200px"><img  src="{{route('getFile',['path' => $item->product_photos[0]['img_path'] ?: null])}}"></div>
                                <div class="d-flex justify-content-center mt-3" style="color:red"> <h4 class="text-center">{{$item->price}}  </h4><h4>р.</h4></div>
                                <div> <h6 class="text-center">{{$item->name}}</h6></div>
                                <div class="d-flex justify-content-center my-2 "> <button class="m-2  py-1 px-3 text-white button_description">В корзину</button></div>
                            </div>

                    @endforeach
            </div>
        </div>


    </div>
</div>

@endsection

@section('script')
    <script src="{{asset('js/cart.js')}}"></script>
@endsection



