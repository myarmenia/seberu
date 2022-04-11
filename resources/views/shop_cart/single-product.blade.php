@include('layouts.app')
      <div id="phone1">Смартфон Sumsung Galaxy M20</div>
      <div id="tog">
       <span style="font-size: 20px;margin-top: 2px;color: #aaa;position: relative;"><i class="fa fa-heart" style="font-size:20px; margin-top:2px; color: #aaa"></i></span>
      <span style="font-size: 20px;margin-top: 2px;color: red;position: relative;margin-left: -24px;"> <i class="fa fa-heart" style="font-size:20px; margin-top:2px; color: red"></i></span>
        В избранные
      </div>
      <div id="artic">Артикул <span id="nmb">№ &nbsp; 123456</span></div>
    </div>
    <hr style="width: 86%;margin-left: 106px" />
    <div class="container align-items-center " id="main">
      <div id="full_image">
        <div id="little_img">
          <div id="little_img1"><img id="img1" src="../images/redmi.webp"></div>
          <div id="little_img2">
            <img id="img2" src="../images/pro_max.jpeg">
          </div>
        </div>
        <div id="fund_img">
          <img id="img3" src="../images/redmi.webp">
        </div>
      </div>
      <div id="distrib_image" class="distr">
        <div id="ins">
        <h3 id="m20">Смартфон Sumsung Galaxy M20</h3>
        <p>Диагональ экрана, дюймы:................................5.45</p>
        <p>Оператижная помять:...........................................2ГБ</p>
        <p>Встроенная память:..............................................16ГБ</p>
        <p>Разрешение основной камеры, Мпикс:..........13</p>
        <p>Процессор:..........................MT6739(4 ядра), 1.5 ГГц</p>
        <h3 id="col">Цвет</h3>
        <div id="colors">
          <div id="black"></div>
          <div id="white"></div>
          <div id="red"></div>
        </div>
        <button id="descrip">Перейти к описанию</button>
      </div>
      </div>
      <div id="price_image">
        <div class="child">
          <p class="pr">35 000 Р.</p>
          <span class="deliv">Выберите город доставки: Москва <span class="icon_sort"> <i class="fa fa-sort-desc" style="font-size:24px"></i></span></span>
          <span class="deliv">Выберите способ доставки: СДЭК <span class="icon_sort"> <i class="fa fa-sort-desc" style="font-size:24px"></i></span></span>
          <div class="buttons">
          <button class="byu_button">Купить</button>
          <button class="basket_button">В карзину</button>
        </div>
        </div>
      </div>
    </div>
    @include('footer-page.footer')
  </section>
</body>

</html>
