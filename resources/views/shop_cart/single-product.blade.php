@include('layouts.app')
<div class="container" style="border:1px solid red">

aaaaaaaaaaaaaaaaaaaaaaaaa
</div>
      <div id="phone1">Смартфон Sumsung Galaxy M20</div>
      <div id="tog">
       <span style="font-size: 20px;margin-top: 2px;color: #aaa;position: relative;"><i class="fa fa-heart" style="font-size:20px; margin-top:2px; color: #aaa"></i></span>
      <span style="font-size: 20px;margin-top: 2px;color: red;position: relative;margin-left: -24px;"> <i class="fa fa-heart" style="font-size:20px; margin-top:2px; color: red"></i></span>
        В избранные
      </div>
      <div id="artic">Артикул <span id="nmb">№ &nbsp; 123456</span></div>
    </div>
    <hr style="width: 86%;margin-left: 106px" />
    <div class="container" id="main">
      <div id="full_image">
        <div id="little_img">
          <div id="little_img1"><img id="img1" src="../images/redmi.webp"></div>
          <div id="little_img2">
            <img id="img2" src="../images/pro_max.jpeg">
          </div>
        </div>
        <div id="fund_img">

            @foreach($product->product_photos as $key )


                     <img  id="img3" src="{{route('getFile',['path' => $key->img_path ?: null])}}" class='w-75'>

            @endforeach


        </div>
      </div>
      <div id="distrib_image" class="distr">
        <div id="ins" style="border:1px solid red">
            <h3 id="m20">{{$product->name}}</h3>

            @foreach ($product->category->characts as $item )

                @if ($item->name!='Цвет')
                    @foreach ( $product['product_chars'] as $key)
                        @if ($key->pivot->chars_id == $item->id)
                        <p>{{$item->name}}................................{{$key->pivot->value }}</p>
                        @endif
                    @endforeach
                @endif



            @if ($item->name=='Цвет')
            <h3 id="col"> {{$item->name}}</h3>
            <div id="colors" style="border:1px solid red">
                @foreach ($color_char as $key)
                     <div style="background: {{$key}}"></div>
                @endforeach


                </div>

            @endif


        @endforeach
        <button id="descrip">Перейти к описанию</button>
      </div>
      </div>
      <div id="price_image">
        <div class="child">
          <p class="pr">{{$product->price}} Р.</p>
          <span class="deliv">Выберите город доставки: Москва <span class="icon_sort"> <i class="fa fa-sort-desc" style="font-size:24px"></i></span></span>
          <span class="deliv">Выберите способ доставки: СДЭК <span class="icon_sort"> <i class="fa fa-sort-desc" style="font-size:24px"></i></span></span>
          <div class="buttons">
          <button class="byu_button">Купить</button>
          <button class="basket_button">В карзину</button>
        </div>
        </div>
      </div>
    </div>
    <div class="same" style="border:1px solid">

        <h4 class="text-center">Похожие товары</h4>
            <div class="d-flex justify-content-center">

                @foreach($like_product as $item)
                        <div class='' style="height:200px;width:200px">
                            <div style="height:100px;width:100px"><img  src="{{route('getFile',['path' => $item->img_path ?: null])}}"></div>
                            <div>{{$item->price}}</div>
                            <div>{{$item->name}}</div>
                            <div><button>kupit</button></div>
                        </div>

                @endforeach
                <div>

                </div>
            </div>
    </div>
    @include('footer-page.footer')
  </section>
</body>

</html>
