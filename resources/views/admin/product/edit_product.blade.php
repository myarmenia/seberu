@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
<div id="tamanho" class="row justify-content-center">
  <div id="tamanho" class="col-8">
    <div class="modal-header">
        <h4 class="modal-title">Редактировать товар</h4>
    </div>
    <div class="alert alert-success d-none my-2">
        <div id="rezult"></div>
    </div>


      <div id="tamanho" class="card-header my-3 bg-white">

        <form   id="update_product" method="Post" enctype='multipart/form-data' >
            @csrf
            <input type="hidden" name="id"  id="url" value="{{route('adminUpdateProduct', $product->id)}}"  class="form-control">
            <div class="form-row">
              <div class="form-group col-12">
                    <label for="inputcategory">Категория товара</label>
                    <input type="text"  class="form-control" value="{{$category->parent->name}}" disabled >
                    <input type="hidden"  class="form-control" name="category" value="{{$category->parent->id}}">
              </div>

            </div>


            <div class="form-row">
                <div class="form-group col-12">
                  <label for="subcategory">Подкатегория товара</label>

                  <select class="form-select"  id="subcategory"  name="subcategory" aria-label="Default select example">

                       @foreach ( $category->parent->child as $items )
                        @if ($items->id==$category->id)
                            <option  value="{{$items->id}}" selected >{{$items->name}}</option>
                        @else
                            <option  value="{{$items->id}}"  >{{$items->name}}</option>
                        @endif
                            <option  value="{{$items->id}}" >{{$items->name}}</option>
                      @endforeach

                  </select>
                  <input type="hidden"  class="form-control" name="category" value="{{$category->id}}">

                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-12">
                  <label for="productname" >Название товара</label>
                  <input type="text" class="form-control "  id="productname"   name="productname"  value="{{$product->name}}" >
                  <span class="invalid-feedback object" role="alert" data-name='productname'></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputPassword4">Количество на складе</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Количество на складе" name="quantity" value="{{$product->quantity}}">
                    <span class="invalid-feedback object" role="alert" data-name='quantity'></span>
              </div>
            </div>


            <div class="form-row" id="characters">
                @foreach ($category_characts->characts as  $item)
                 @if($item->name=='Цвет')
                                <div class='card-body'>
                                    <label for='productsize'>{{$item->name}}</label>
                                    <div class='color'style='height:150px;border: 1px solid #ced4da;background-color: #f8fafc; overflow-y:scroll'>
                                        @foreach ($color as $col)
                                            @if (in_array($col->name, $color_char))

                                                    <div class='d-flex align-items-center my-1'><input type='checkbox' value='{{$col->name}}' checked class='all_colors mx-2' name='character_colors[{{$item->id}}][][value]'><div style='height:30px;width:30px;background:{{$col->name}}'></div></div>
                                                    @else
                                                    <div class='d-flex align-items-center my-1'><input type='checkbox' value='{{$col->name}}'  class='all_colors mx-2' name='character_colors[{{$item->id}}][][value]'><div style='height:30px;width:30px;background:{{$col->name}}'></div></div>
                                                    @endif
                                        @endforeach
                                    </div>
                                    <input type='hidden' name='color' value=''>
                                    <span class='invalid-feedback  object' role='alert' data-name='color'></span>
                                    {{-- <span class='invalid-feedback colorpiker d-none' role='alert' data-name ='{{$item->name}}'></span> --}}
                                </div>
                 @else

                    <div class='form-group col-12'>
                        <label for='productsize'> {{$item->name}}</label>
                        @foreach ($product['product_chars'] as $key )
                             @if ($key->pivot->chars_id == $item->id)
                                <input type='text' class='form-control characterpicker' id = '"+element.id+"'  data-attribute ='{{$item->name}}'  value='{{$key->pivot->value}}'   name='characters[{{$item->id}}][value]'>
                                {{-- <span class='invalid-feedback' role='alert' data-name ='{{$item->name}}'> --}}
                                <span class='invalid-feedback object' role='alert' data-name ='characters.{{$item->id}}.value'></span>
                            @endif
                        @endforeach
                    </div>
                 @endif
                @endforeach

            </div>
            <div class="form-row">
                <label for="coment">Описание</label>
                <textarea class="form-control" id="comment" cols="10" placeholder="Leave a comment here"  name="comment"  style="height: 100px">{{$product->description}}</textarea>
                <span class="invalid-feedback object" role="alert" data-name='comment'>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена товара</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" placeholder="Цена товара" value='{{$product->price}}'>
                  <span class="invalid-feedback object" role="alert" data-name='product_price'>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена продажи</label>
                  <input type="text" class="form-control" id=""  name="selling_price" placeholder="Цена продажи" value='{{$product->sale_price}}'>
                  <span class="invalid-feedback object" role="alert" data-name='product_price'>
                </div>

            </div>
            <div class="form-group">
                <label for="product_img"><i class="fa fa-upload" style="font-size:48px;color:#0d6efd"></i></label>
                <input type="file" class="form-control d-none" id="product_img"  multiple name="img_path[]" >
                <span class="invalid-feedback object" role="alert" data-name='img_path'></span>


            </div>
            <div id="previmg" class="d-flex">
                @foreach ($product->product_photos as  $key)
                    <div id='a{{$key->id}}' class='m-2' style='height:150px;width:150px'><img src="{{route('getFile',['path' => $key->img_path ?: null])}}" class='w-75'><span class='removefromdb m-2' style='position:absolute;font-size:25px' data-attr='{{$key->id}}'>x</span></div>
                @endforeach
            </div>

             <input type="submit" value="Обновить" id="btnSubmit"/>
          </form>
          <div id="rezult"></div>

        </div>

</div>

@stop

@section('css')
    <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
@stop

@section('js')
<script>


$('#update_product').on('submit',function(e){
             e.preventDefault()
             $url=$('#url').val()

             let arrayList=[]

            $('.all_colors').each(function(){
                if($(this).is(':checked')){
                    arrayList.push($(this).val())
                    }
            })

            if(arrayList.length > 0){
                $('input[name=color]').val('hasVal')
            }

            $('.object').html('')

    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                    type: "post",
                    url: $url,
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,

                    success: function(result){
                        $('.alert-success').removeClass("d-none").show();
                        // $('.alert-success').html(result)
                        $('#rezult').text("Продукт обновлен")
                    },

                    error: function(data) {
                // console.log(data)
                $(".object").html('');
                        var errors = data.responseJSON.errors;
                        $.each(errors, function (index, value) {
                            console.log("hello")
                            if (value.length != 0 )
                            {
                                $('.invalid-feedback').css('display','block')
                                $(".object[data-name='"+index+"']").html( value);
                            }
                        });
                                }
            })

})




$('#product_img').on('change',function(){
                const file = this.files;
                //  console.log(file);
                 if (file){
                    for(let i=0;i<file.length;i++){
                        // console.log(file[i])
                        console.log(i)
                        let reader = new FileReader();
                        reader.onload = function(event){
                            // console.log(event.target.result);


                            $('#previmg').append("<div id='a"+i+"' class='m-2' style='height:150px;width:150px'><img src='"+event.target.result+"'class='w-75'><span class='removeprodphoto m-2' style='position:absolute;font-size:25px' data-attr='"+i+"'>x</span></div>")

                         }
                        //  console.log(file[i])
                        reader.readAsDataURL(file[i]);

                    }
                 }


})



let arr ='';
$('body').on('click','.removeprodphoto',function(){
            let dt = new DataTransfer();

            let key=$(this).attr('data-attr')
            arr=$('#product_img')[0].files

            for (let file of arr) {
                    dt.items.add(file);
            }

        dt.items.remove(key);


        $('#product_img')[0].files = dt.files;


        $(this).parent().remove()

     })





     $('.removefromdb').on('click',function(){
        let key = $(this).attr('data-attr')
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                    type: "post",
                    url: "{{ route('adminEditDeletePhoto')}}",
                    data: {key},
                    success: function(result){
                        console.log(result)
                        if(result=="deleted"){
                             $('#a'+key).remove()

                        }

                    }
            })

     })



</script>
@stop
