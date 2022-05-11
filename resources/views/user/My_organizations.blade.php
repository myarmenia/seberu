
@extends('layouts.app')

@section('content')

<main class="content">
    <section class="main-content">
        <div class="wrapper">
            <div class="box">
                <div class="js--image-preview"><img  src="/storage/main-images/{{Auth::user()->company_image}}"  data-aos="fade-up-right"  style="width: 250px; height:250px;border: 1px solid black;"></video></div>
                <div class="upload-options">
                    <span style="color:red">@error('img_path'){{$message}}@enderror</span>
                    <label>
                        <input name="img_path" id="file" type="file" class="image-upload"style="visibility: hidden; position: absolute"; onchange="uploadImg(event)"><br>
                        <i class="fa fa-upload" aria-hidden="true" style="font-size:25px"></i>
                    </label>
                </div>
            </div>
        </div>
    </section>
     @if(Auth::User()->organization_name)
        <section class="main-content">
            <div class="ajax_message"></div>

            <div class="form-group">
                <label>Я - представитель юридического лица</label>
                <input type="text"  class="form-control"    value="законный" placeholder="Я - представитель юридического лица" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Наименование организации*</label>
                <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Наименование организации"  value="{{Auth::User()->organization_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ИНН*</label>
                <input type="text" name="inn" class="form-control"  placeholder="ИНН" id="inn"  value="{{Auth::User()->inn}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">КПП*</label>
                <input type="text" name="cpp" class="form-control" id="cpp" placeholder="КПП" value="{{Auth::User()->cpp}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Юридический адрес (полный адрес)*</label>
                <input type="text" name="legal_address" class="form-control" id="legal_address" placeholder="Юридический адрес (полный адрес)"  value="{{Auth::User()->legal_address}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Почтовый адрес (полный адрес)*</label>
                <input type="text" name="post_address" class="form-control" id="post_address" placeholder="Почтовый адрес (полный адрес)"  value="{{Auth::User()->post_address}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Телефон*</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон"  value="{{Auth::User()->phone}}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Наименование банка*</label>
                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Наименование банка" value="{{Auth::User()->bank_name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Город банка*</label>
                <input type="text" name="bank_city" class="form-control" id="bank_city" placeholder="Город банка" value="{{Auth::User()->bank_city}}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">БИК*</label>
                <input type="text" name="bic" class="form-control" id="bic" placeholder="БИК" value="{{Auth::User()->bic}}">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Корреспондентский счет</label>
                <input type="text" name="correspondent_account" class="form-control" id="correspondent_account" placeholder="Корреспондентский счет" value="{{Auth::User()->correspondent_account}}">
            </div>
            <button type="submit" id="ajaxSubmit" class="add-button" class="btn btn-primary">Обновить</button>
            <a href="/profile"><button type="submit" class="back-button" class="btn btn-primary"><i class="fa fa-arrow-left" style="margin:0 20px 0 0" aria-hidden="true"></i>Назад</button></a>
        </section>
 @else
        <section class="main-content">
            <div class="ajax_message"></div>
            <div class="form-group">
                <label>Я - представитель юридического лица</label>
                <input type="text"  class="form-control"    value="законный" placeholder="Я - представитель юридического лица" disabled>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Наименование организации*</label>
                <input type="text" name="organization_name"  class="form-control" id="organization_name" placeholder="Наименование организации">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">ИНН*</label>
                <input type="text" name="inn" class="form-control"  placeholder="ИНН" id="inn">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">КПП*</label>
                <input type="text" name="cpp" class="form-control" id="cpp" placeholder="КПП">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Юридический адрес (полный адрес)*</label>
                <input type="text" name="legal_address" class="form-control" id="legal_address" placeholder="Юридический адрес (полный адрес)">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Почтовый адрес (полный адрес)*</label>
                <input type="text" name="post_address" class="form-control" id="post_address" placeholder="Почтовый адрес (полный адрес)">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Телефон*</label>
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Телефон">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Наименование банка*</label>
                <input type="text" name="bank_name" class="form-control" id="bank_name" placeholder="Наименование банка">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Город банка*</label>
                <input type="text" name="bank_city" class="form-control" id="bank_city" placeholder="Город банка">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">БИК*</label>
                <input type="text" name="bic" class="form-control" id="bic" placeholder="БИК">

            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Корреспондентский счет</label>
                <input type="text" name="correspondent_account" class="form-control" id="correspondent_account" placeholder="Корреспондентский счет">
            </div>
            <button type="submit" id="ajaxSubmit" class="add-button" class="btn btn-primary">Добавлять</button>
            <a href="/profile"><button type="submit" class="back-button" class="btn btn-primary"><i class="fa fa-arrow-left" style="margin:0 20px 0 0" aria-hidden="true"></i>Назад</button></a>
        </section>
  @endif
    @include('User.sidebar_menu')
</main>
@include('footer-page.footer')
<script src="http://code.jquery.com/jquery-3.3.1.min.js"
      integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
      crossorigin="anonymous">
</script>
<script>

let imga = new FormData();
        function uploadImg(e){
            imga.append("company_image",e.target.files[0]);
        }
            $('#ajaxSubmit').click(function(e) {
            imga.append("_token","{{csrf_token()}}");
            imga.append("organization_name",jQuery('#organization_name').val());
            imga.append("inn",jQuery('#inn').val());
            imga.append("cpp",jQuery('#cpp').val());
            imga.append("legal_address",jQuery('#legal_address').val());
            imga.append("post_address",jQuery('#post_address').val());
            imga.append("phone",jQuery('#phone').val());
            imga.append("bank_name",jQuery('#bank_name').val());
            imga.append("bank_city",jQuery('#bank_city').val());
            imga.append("bic",jQuery('#bic').val());
            imga.append("correspondent_account",jQuery('#correspondent_account').val());

            e.preventDefault();
            $.ajax({
            type:'POST',
            url: "{{route('update',Auth::User()->id)}}",
            data: imga,
            cache:false,
            contentType: false,
            processData: false,
            success: (data) => {
             $('.ajax_message').append(data.message)
            },
            error: function(data){
            console.log(data);
            }
            });
            });

</script>
@endsection














