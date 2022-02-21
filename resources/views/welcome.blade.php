@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')
<div class="container align-items-center hed">
 <div>Краснадар</div>
 <div>Бренды</div>
 <div>Косметика</div>
 <div>Автотовары</div>
 <div>Детям</div>
 <div>Красота и здоровья</div>
 <div>Товары для дома</div>
 <div>Подарки и праздник</div>
 <div>Еще...</div>
</div>
<section class="w-100">
 <div class="container align-items-center btf ">
   <div id="carouselExampleCaptions" class="carousel slide crs" data-bs-ride="carousel">
     <div class="carousel-indicators">
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
         aria-current="true" aria-label="Slide 1"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
         aria-label="Slide 2"></button>
       <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
         aria-label="Slide 3"></button>
     </div>
     <div class="carousel-inner">
       <div class="carousel-item active">
         <img src="{{asset('storage/main-images/8b6.png')}}" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h5>Anythink about site</h5>
           <p>Some representative placeholder content for the first slide.</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="{{asset('storage/main-images/8b6.png')}}" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h5>Anythink about site</h5>
           <p>Some representative placeholder content for the second slide.</p>
         </div>
       </div>
       <div class="carousel-item">
         <img src="{{asset('storage/main-images/8b6.png')}}" class="d-block w-100" alt="...">
         <div class="carousel-caption d-none d-md-block">
           <h5>Anythink about site</h5>
           <p>Some representative placeholder content for the third slide.</p>
         </div>
       </div>
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
       data-bs-slide="prev">
       <span class="carousel-control-prev-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
       data-bs-slide="next">
       <span class="carousel-control-next-icon" aria-hidden="true"></span>
       <span class="visually-hidden">Next</span>
     </button>
   </div>
 </div>
</section>
<section>
 <div class="cnt">
   <div id="first">Похожие товары </div>
   <div id="sec">
     <div class="d1">

       <img src="{{asset('storage/main-images/ppp.png')}}" id="imgs"/>
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>

     <div class="d1">
       <img src="{{asset('storage/main-images/phone1.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/phone.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/ges.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/phone1.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/ppp.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
   </div>
 </div>

 <div class="cnt">
   <div id="second">Популярные товары </div>
   <div id="sec">
     <div class="d1">

       <img src="{{asset('storage/main-images/ges.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>

     <div class="d1">
       <img src="{{asset('storage/main-images/phone1.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/ppp.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/phone.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/ges.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
     <div class="d1">
       <img src="{{asset('storage/main-images/chop.png')}}" id="imgs" />
       <p>2200 pуб.</p>
       <h6>Название товара</h6>
       <button class="btt">В корзину</button>
     </div>
   </div>
 </div>
 <div class="cnt1">
   <div id="thrid">Популярные категории </div>
   <div id="books">
     <div id="book">
       <div class="bks"><span class="boo">Книги</span></div>
       <div class="bks"><span class="boo">Книги</span></div>
       <div class="bks"><span class="boo">Книги</span></div>
       <div class="bks"><span class="boo">Книги</span></div>
       <div class="bks"><span class="boo">Книги</span></div>
       <div class="bks"><span class="boo">Книги</span></div>
     </div>
     <div id="book1">
       <p>Акция</p>
       <h4  style="font-size:1.7vw;font-weight:700">на всю <br />бытовую технику</h4>
       <img src="{{asset('storage/main-images/361156.jpg')}}" id="srn">
     </div>
   </div>
 </div>
@endsection
