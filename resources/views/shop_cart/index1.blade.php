@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/cart.css')}}">

@endsection

@section('title')
    Cart
@endsection

@section('content')

    <div class="p-5 d-flex">
        <div class="user_sidebar">
            @include('User.sidebar_menu')
        </div>

            <div class="cart w-100" style="border:1px solid red">
                <div class="d-flex  justify-content-between">
                    <div><h3>Корзина</h3></div>

                </div>
                <hr>
                @if(count($cart)<1)
                    <div><h2 class=" text-danger text-center p-2">В настоящее время корзина пуста</h2></div>

                @else

                    @foreach ($cart as $item )
                    <div class="d-flex justify-content-between items mt-2" id="{{$item->id}}" style="border:1px solid blue ">
                            <div class="d-flex " style="border:1px solid yellow">
                                <div  class="d-flex justify-content-center" style="height:200px;width:200px;border:1px solid green">
                                    <img  id="img3" src="{{route('getFile',['path' => $item->products->product_photos[0]->img_path ?: null])}}">
                                </div>
                                <div style="border:1px solid red;">
                                    <h4>{{ $item->products->name }}</h4>
                                    <div style="height:30px;width:30px;background:{{$item->product_color}}"></div>

                                </div>
                            </div>
                            <div   style="border:1px solid green;">
                                    <div  class="quantity" style="border:1px solid red">
                                        <button class="btn  btn-sm remove-from-cart ml-3" data-id="{{ $item->id }}"><i class="fa fa-trash" style="font-size:28px;color: #e2e2e2;"></i></button>

                                        <input type="button" value="-"  class="action" data-action="minus" data-attribute="{{ $item->prod_id }}" data-cartid="{{ $item->id }}" style="width:30px;height:30px;background:none;border:1px solid #e2e2e2;">
                                        <input type="text" name="quantity"  value="{{ $item->quantity }}" class="qty" style="width:30px;height:30px;border:1px solid #e2e2e2;">
                                        <input type="button" value="+" data-action="plus"  data-attribute="{{ $item->prod_id }}" data-cartid="{{ $item->id }}" class="action"  style="width:30px;height:30px;background:none;border:1px solid #e2e2e2;">
                                        <br>
                                        <input type="text" value="{{$item->product_quantity_price }}"  data-price="{{ $item->products->price }}" class="text-danger font-weight-bolder text-center total_price">
                                    </div>
                            </div>
                    </div>
                        {{-- <div class="d-flex justify-content-around items mt-2" id="{{$item->id}}">
                            <div  class="d-flex" style="height:200px;width:200px">
                                <img  id="img3" src="{{route('getFile',['path' => $item->products->product_photos[0]->img_path ?: null])}}"></div>
                            <div style="border:1px solid red">
                                <p class="font-weight-bolder">{{ $item->products->name }}</p>
                                <div style="height:30px;width:30px;background:{{$item->product_color}}"></div>

                            </div>
                            <div>
                                <button class="btn btn-danger btn-sm remove-from-cart" data-id="{{ $item->id }}"><i class="fa fa-trash"></i></button>
                            </div>
                            <div style="width:300px">
                                <div class="quantity">
                                    <input type="button" value="-"  class="action" data-action="minus" data-attribute="{{ $item->prod_id }}" data-cartid="{{ $item->id }}" style="border:1px solid green">
                                    <input type="text" name="quantity"  value="{{ $item->quantity }}" class="qty">
                                    <input type="button" value="+" data-action="plus"  data-attribute="{{ $item->prod_id }}" data-cartid="{{ $item->id }}" class="action">
                                    <input type="text" value="{{$item->product_quantity_price }}" data-price="{{ $item->products->price }}" class="total_price">
                                </div>
                            </div>
                        </div> --}}
                    @endforeach
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div></div>
                        <div  style="width:230px;border:1px solid red">
                            <div class="d-flex justify-content-center align-items-center mt-2" ><div class="font-weight-bolder mr-2">Итог:</div> <div class= "text-danger font-weight-bolder"  id="total_amount">0</div></div>
                            <div class="d-flex justify-content-center my-2">
                                <button  class="button_description rounded py-1 px-3 text-white" id="oformit">Оплатить</button>
                            </div>
                        </div>

                    </div>
                @endif





                <div class="alert alert-success d-none my-2" style="border:1px solid blue">
                    <div id="rezult" class="text-center">aaaaaaaaaaaa</div>
                </div>

            </div>

            <script>
                $(document).ready(function(){
                    $('#oformit').on('click',function(){
                        let total_amount=$('#total_amount').html()

                    prod_array=[]
                        $('.items').each(function(){
                            prod_array.push($(this).attr('id'))
                        })
                        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "POST",
                    url: "/profile/order",
                    data: { prod_array,total_amount },
                    success: function(result){
                        $('.cart').html("<div class='alert alert-success d-none my-2'><div id='rezult'>"+result+"</div></div>")
                        // $('#result').html(result)
                        // $('#'+product_id).remove()
                        // $('.alert-success').removeClass("d-none").show();
                        // $('#rezult').text(result)
                    },
                    error: function(data) {

                        var errors = data.responseJSON.message;
                        console.log(errors)
                    }

                })

                    })

                })
            </script>

    </div>



    @section('script')
        <script src="{{ asset('js/cart.js')}}"></script>
    @endsection







@endsection
