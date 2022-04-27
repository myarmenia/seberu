@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')

  <section >
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" >
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active" >
          <img src="{{asset('storage/main-images/but.png')}}" class="d-block w-100" alt="..." class="img_xs">
          <div class="carousel-caption">
            <h5>Anythink about site</h5>
            <p>for the first slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('storage/main-images/but.png')}}" class="d-block w-100" alt="..." class="img_xs">
          <div class="carousel-caption">
            <h5>Second slide label</h5>
            <p>for the second slide.</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="{{asset('storage/main-images/but.png')}}" class="d-block w-100" alt="..." class="img_xs">
          <div class="carousel-caption">
            <h5>Third slide label</h5>
            <p>for the third slide.</p>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

  </section>
  <section id="sec">
    <div class="cnt">
      <div id="first">Похожие товары </div>
      <div class="sec">
        <div class="d1">

          <img src="{{asset('storage/main-images/ppp.png')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>

        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
      </div>
    </div>

     <div class="cntt">
      <div id="second">Популярные товары </div>
      <div class="sec">
        <div class="d1">

          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>

        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
        <div class="d1">
          <img src="{{asset('storage/main-images/phone1.jpg')}}" id="imgs" />
          <p>2200 pуб.</p>
          <h6>Название товара</h6>
          <button class="btt">В корзину</button>
        </div>
      </div>
    </div>
  </section>
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
        <h4 style="font-size:1.7vw;font-weight:700">на всю <br />бытовую технику</h4>
        <img src="{{asset('storage/main-images/361156.jpg')}}" id="srn">
      </div>
    </div>
  </div>
  </div>
  </div>
  <div id="lnk"><img src="{{asset('storage/main-images/image 27.png')}}" id="cotegs"></div>
  <div id="four-divs">
    <div id="rem">
      <h3>Ремонт авто последние новости</h3>
    </div>
    <div id="igr">
      <h3>Во что играют<br /> Ваши дети?</h3>
    </div>
    <div id="tre">
      <h3>Тренды этого<br /> сезона</h3>
    </div>
    <div id="ntb">
      <h3>Выбери свой ноутбук</h3>
    </div>
  </div>
@endsection

