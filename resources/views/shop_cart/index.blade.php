@extends('layouts.app')

@section('title')
    Cart
@endsection

@section('content')
{{-- <div class="container" style="border:1px solid red"> --}}
    <div class="p-5 d-flex">
        <div class="user_sidebar">
            @include('User.sidebar_menu')
        </div>

            <div class="cart w-100" style="border:1px solid red">
                <div class="d-flex  justify-content-between">
                    <div>Корзина</div>
                    <div><button>В корзину</button></div>
                </div>
                <hr>
                @foreach ($cart as $item )
                    <div class="d-flex">
                        <div><img  id="img3" src="{{route('getFile',['path' => $item->products->img_path ?: null])}}" style="height:200px;width:200px"></div>
                        <div>
                            <p>{{ $item->products->name }}</p>
                            <p>@php
                                // dd($item->products->product_chars)

                            @endphp</p>

                        </div>
                        <div>{{ $item->product_quantity_price }}</div>
                        <div>{{ $item->quantity }}

                        </div>
                    </div>
                @endforeach
                <div></div>
                <div></div>
                <div></div>
            </div>
    </div>



{{-- </div> --}}

@endsection
