@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
<div id="tamanho" class="row justify-content-center">
  <div id="tamanho" class="col-8">
    <div class="alert alert-success d-none my-2">
        <div id="rezult"></div>
    </div>
    {{-- <div id="tamanho" class="card my-3 "> --}}
      <div id="tamanho" class="card-header my-3 bg-white">

        <form class="" id="add_product" method="Post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
              <div class="form-group col-12">
                <label for="inputcategory">Категория товара</label>
                <select class="form-select" id="category"  name="category" aria-label="Default select example">
                    <option selected>Категория товара</option>
                    @foreach ( $categories as $key=>$items )
                        <option value="{{$items->id}}">{{$items->name}}</option>
                    @endforeach

                  </select>
                  <span style="color:red">@error('category')Выберите Категория товара@enderror</span>
              </div>

            </div>
            <div class="form-row">
                <div class="form-group col-12">
                  <label for="subcategory">Подкатегория товара</label>
                  <select class="form-select"  id="subcategory"  name="subcategory" aria-label="Default select example">
                    <option selected>Подкатегория товара</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <span style="color:red">@error('category') Выберите Подкатегория товара@enderror</span>
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-12">
                  <label for="productname" >Название товара</label>
                  <input type="text" class="form-control "  id="productname"   name="productname"  >
                  <span class="invalid-feedback object" role="alert" data-name='productname'>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputPassword4">Количество на складе</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Количество на складе" name="quantity">
                    <span style="color:red">@error('quantity') Выберите Название товара@enderror</span>
              </div>
            </div>



            <div class="form-row" id="characters">

            </div>

            <div class="form-row">
                <textarea class="form-control" id="comment" cols="10" placeholder="Leave a comment here"  name="comment"  style="height: 100px"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена товара</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Цена товара">
                  <span class="invalid-feedback object" role="alert" data-name='product_price'>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена продажи</label>
                  <input type="text" class="form-control" id=""  name="selling_price" placeholder="Цена продажи">
                  <span class="invalid-feedback object" role="alert" data-name='product_price'>
                </div>

            </div>
            <div class="form-group">
                <label for="product_img"><i class="fa fa-upload" style="font-size:48px;color:#0d6efd"></i></label>
                <input type="file" class="form-control d-none" id="product_img"  multiple name="img_path[]" >
                <span class="invalid-feedback object" role="alert" data-name='img_path'>
            </div>
            <div id="previmg" class="d-flex"></div>

            <select class="form-control  mycharacts"  name="gujn['2'][]"  multiple="multiple">
                <option value="red">red</option>
                <option value="green">green</option>
                <option value="blue">blue</option>
            </select>

            <input type="submit" value="Добавлять" id="btnSubmit"/>


          </form>
          <div id="rezult"></div>



        </div>
    {{-- </div> --}}
</div>

@stop

@section('css')
    <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
@stop

@section('js')
<script>
    $('#category').on('change',function(){
            let category_id = $('#category').val();
            $("#subcategory").html('')
            $('#characters').html('')
            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                    type: "post",
                    url: "{{ route('adminGetSubcategory')}}",
                    data: {category_id},

                    success: function(result){
                        let arr = JSON.parse(result)

                         arr.forEach(element => {

                                if(element.child){

                                    element.child.forEach(element=>{
                                        $("#subcategory").append("<option value='"+element.id+"' name='"+element.name+"'>"+element.name+"</option>")
                                    })

                                }
                                if(element.characts){

                                    element.characts.forEach(element=>{
                                            $('#characters').append("<div class='form-group col-12'><label for='productsize'>"+element.name+"</label><input type='text' class='form-control' id = '"+element.id+"' placeholder='"+element.name+" товара' data-attribute ='"+element.id+"' name='characters["+element.id+"][]'><input type='hidden' class='form-control' id = '"+element.id+"' placeholder='"+element.name+" товара' data-attribute ='"+element.id+"' name='"+element.id+"'>"
                                                +"<span class='invalid-feedback object' role='alert' data-name ='"+element.name+"'></div>");

                                    })

                                }

                        });


                    }
            })

            $('#product_img').on('change',function(){
                const file = this.files;
                //  console.log(file);
                 if (file){

                    for(i=0;i<file.length;i++){
                        // console.log(file[i])

                        let reader = new FileReader();
                        reader.onload = function(event){
                            // console.log(event.target.result);


                            $('#previmg').append("<div id='a"+i+"' class='m-2' style='height:150px;width:150px'><img src='"+event.target.result+"'class='w-75'><span class='removeprodphoto m-2' style='position:absolute;font-size:25px'>x</span></div>")

                         }
                        reader.readAsDataURL(file[i]);

                    }
                 }



            })



    })

$('body').on('click','.removeprodphoto',function(){
                $(this).parent().remove()
            })
$('#add_product').on('submit',function(e){
             e.preventDefault()

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                    type: "post",
                    url: "{{route('adminAddProduct')}}",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,

                    success: function(result){
                        $('.alert-success').removeClass("d-none").show();
                        // $('.alert-success').html(result)
                        $('#rezult').html(result)
                    },

                    error: function(data) {
                // console.log(data)
                $(".object").html( '');
                        var errors = data.responseJSON.errors;
                        $.each(errors, function (index, value) {
                            // console.log(index)
                            if (value.length != 0 )
                            {
                                $('.invalid-feedback').css('display','block')
                                $(".object[data-name='"+index+"']").html( value);
                            }
                        });
                                }
            })

})


</script>
@stop
