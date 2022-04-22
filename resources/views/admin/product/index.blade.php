@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
<div id="tamanho" class="row justify-content-center">
  <div id="tamanho" class="col-8">
    <div class="alert alert-success d-none my-2">
        <div id="rezult"></div>
    </div>

      <div id="tamanho" class="card-header my-3 bg-white">

        <form class="" id="add_product" method="Post" enctype="multipart/form-data" >
            @csrf
            <div class="form-row">
              <div class="form-group col-12">
                <label for="inputcategory">Категория товара</label>
                <select class="form-select" id="category"  name="category" aria-label="Default select example">
                    <option selected disabled>Категория товара</option>
                    @foreach ( $categories as $key=>$items )
                        <option value="{{$items->id}}">{{$items->name}}</option>
                    @endforeach

                  </select>
                  <span class="invalid-feedback object" role="alert" data-name='category'>

              </div>

            </div>
            <div class="form-row">
                <div class="form-group col-12">
                  <label for="subcategory">Подкатегория товара</label>
                  <select class="form-select"  id="subcategory"  name="subcategory" aria-label="Default select example">
                    <option selected disabled>Подкатегория товара</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
                  <span class="invalid-feedback object" role="alert" data-name='subcategory'></span>

                </div>

            </div>

            <div id="subcatecorydirection">

            </div>
            <div id="subcatecorydirectionchild">

            </div>


            <div class="form-row">
                <div class="form-group col-12">
                  <label for="productname" >Название товара</label>
                  <input type="text" class="form-control "  id="productname"   name="productname"   value="{{ old('productname') }}" >
                  <span class="invalid-feedback object" role="alert" data-name='productname'></span>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-12">
                    <label for="inputPassword4">Количество на складе</label>
                    <input type="text" class="form-control" id="quantity" placeholder="Количество на складе" name="quantity" value="{{ old('quantity') }}">
                    <span class="invalid-feedback object" role="alert" data-name='quantity'></span>
              </div>
            </div>



            <div class="form-row" id="characters">

            </div>

            <div class="form-row">
                <label for="coment">Описание</label>
                <textarea class="form-control" id="comment" cols="10" placeholder="Leave a comment here"  name="comment" value="{{ old('comment') }}" style="height: 100px"></textarea>
                <span class="invalid-feedback object" role="alert" data-name='comment'></span>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена товара</label>
                  <input type="text" class="form-control" id="product_price" name="product_price" value="{{ old('product_price') }}" placeholder="Цена товара">
                  <span class="invalid-feedback object" role="alert" data-name='product_price'></span>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-12">
                  <label for="inputEmail4">Цена продажи</label>
                  <input type="text" class="form-control" id=""  name="selling_price" value="{{ old('selling_price') }}"   placeholder="Цена продажи">
                  <span class="invalid-feedback object" role="alert" data-name='product_price'>
                </div>

            </div>
            <div class="form-group">
                <label for="product_img"><i class="fa fa-upload" style="font-size:48px;color:#0d6efd"></i></label>
                <input type="file" class="form-control d-none" id="product_img"  multiple name="img_path[]"  >
                <span class="invalid-feedback object" role="alert" data-name='img_path'></span>
            </div>
            <div id="previmg" class="d-flex"></div>

            <input type="submit" value="Добавлять" id="btnSubmit"/>
          </form>
        </div>


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
            // $('#characters').html('')
            $('#subcatecorydirection').html('')
            $('#subcatecorydirectionchild').html('')
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
                        // console.log(result)
                        let arr = JSON.parse(result)
                            console.log(arr)
                         arr.forEach(element => {

                                if(element.child){

                                    element.child.forEach(element=>{
                                        $("#subcategory").append("<option value='"+element.id+"' name='"+element.name+"'>"+element.name+"</option>")
                                    })
                                }
                                if(element.characts){
                                    element.characts.forEach(element=>{
                                        if(element.name=="Цвет"){

                                                 $('#characters').append("<div class='card-body'><label for='productsize'>"+element.name+"</label><div class='color' style='height:150px;border: 1px solid #ced4da;background-color: #f8fafc; overflow-y:scroll'></div> <span class='invalid-feedback  object' role='alert' data-name='color'></span><input type='hidden' name='color' value=''></div>")
                                                 for(i=0;i<arr[2].length;i++){
                                                     $('.color').append("<div class='d-flex align-items-center my-1'><input type='checkbox' value='"+arr[2][i].name+"' class='all_colors mx-2' name='character_colors["+element.id+"][][value]'><div style='height:30px;width:30px;background:"+arr[2][i].name+"'></div></div>")
                                                }
                                        }else{
                                            $('#characters').append("<div class='form-group col-12'><label for='productsize'>"+element.name+"</label><input type='text' class='form-control characterpicker' id = '"+element.id+"' placeholder='"+element.name+" товара' data-attribute ='"+element.id+"' name='characters["+element.id+"][value]'>"
                                                +"<span class='invalid-feedback object' role='alert' data-name ='characters."+element.id+".value'></span></div>");
                                                }
                                    })
                                }
                        });

                    }

            })

            $('#subcategory').on('change',function(){

            let category_id = $('#subcategory').val();
            alert(category_id)
            $("#subcatecorydirection").html('')

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                    type: "post",
                    url: "{{ route('adminGetSubcategoryChild')}}",
                    data: {category_id},
                    success: function(result){

                         let arr = JSON.parse(result)
                        //  console.log(arr)

                         $('#subcatecorydirection').html("<div class='form-row'><div class='form-group col-12'><select class ='form-select selectchild' name='selectchild'></select></div></div>")
                        // console.log(arr.child.length)
                         arr.forEach(element => {

                            if(element.child){

                                    element.child.forEach(element=>{
                                        $(".selectchild").append("<option value='"+element.id+"' name='"+element.name+"'>"+element.name+"</option>")
                                    })
                            }

                                element.characts.forEach(element=>{
                                    if(element.name=="Цвет"){

                                            $('#characters').append("<div class='card-body'><label for='productsize'>"+element.name+"</label><div class='color' style='height:150px;border: 1px solid #ced4da;background-color: #f8fafc; overflow-y:scroll'></div> <span class='invalid-feedback  object' role='alert' data-name='color'></span><input type='hidden' name='color' value=''></div>")
                                            for(i=0;i<arr[2].length;i++){
                                                $('.color').append("<div class='d-flex align-items-center my-1'><input type='checkbox' value='"+arr[2][i].name+"' class='all_colors mx-2' name='character_colors["+element.id+"][][value]'><div style='height:30px;width:30px;background:"+arr[2][i].name+"'></div></div>")
                                            }
                                    }else{
                                        $('#characters').append("<div class='form-group col-12'><label for='productsize'>"+element.name+"</label><input type='text' class='form-control characterpicker' id = '"+element.id+"' placeholder='"+element.name+" товара' data-attribute ='"+element.id+"' name='characters["+element.id+"][value]'>"
                                            +"<span class='invalid-feedback object' role='alert' data-name ='characters."+element.id+".value'></span></div>");
                                            }
                                })

                            //  $('.selectchild').append("<option value='"+element.id+"'>"+element.name+"</option>");

                        });

                    }

            })
        })
        $('body').on('change','.selectchild',function(){

            let category_id = $('.selectchild').val();
            console.log(category_id)
            // $(".selectchild").html('')

            $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
            });

            $.ajax({
                    type: "post",
                    url: "{{ route('adminGetSubcategoryChild')}}",
                    data: {category_id},
                    success: function(result){
                        // console.log(result)
                         let arr = JSON.parse(result)
                    //  console.log(arr)
                    //  if(arr.child.length!=0){
                    //         $('#subcatecorydirectionchild').html("<select class ='form-select selectchild' name='selectchild'><option disabled>Выберите подкатегорию</option></select>")
                    //      console.log(arr.child)
                    //         arr.child.forEach(element => {

                    //             $('.selectchild').append("<option value='"+element.id+"'>"+element.name+"</option>");

                    //         });
                    //     }
                    arr.forEach(element => {
                            if(element.child){

                                    element.child.forEach(element=>{
                                        $(".selectchild").append("<option value='"+element.id+"' name='"+element.name+"'>"+element.name+"</option>")
                                    })
                            }
                                if(element.characts){
                                element.characts.forEach(element=>{
                                    console.log(element.name)
                                    if(element.name=="Цвет"){

                                            $('#characters').append("<div class='card-body'><label for='productsize'>"+element.name+"</label><div class='color' style='height:150px;border: 1px solid #ced4da;background-color: #f8fafc; overflow-y:scroll'></div> <span class='invalid-feedback  object' role='alert' data-name='color'></span><input type='hidden' name='color' value=''></div>")
                                            for(i=0;i<arr[2].length;i++){
                                                $('.color').append("<div class='d-flex align-items-center my-1'><input type='checkbox' value='"+arr[2][i].name+"' class='all_colors mx-2' name='character_colors["+element.id+"][][value]'><div style='height:30px;width:30px;background:"+arr[2][i].name+"'></div></div>")
                                            }
                                    }else{
                                        $('#characters').append("<div class='form-group col-12'><label for='productsize'>"+element.name+"</label><input type='text' class='form-control characterpicker' id = '"+element.id+"' placeholder='"+element.name+" товара' data-attribute ='"+element.id+"' name='characters["+element.id+"][value]'>"
                                            +"<span class='invalid-feedback object' role='alert' data-name ='characters."+element.id+".value'></span></div>");
                                            }
                                })
                                }
                            //  $('.selectchild').append("<option value='"+element.id+"'>"+element.name+"</option>");

                        });


                    }

            })
        })

            $('#product_img').on('change',function(){
                const file = this.files;
                 console.log(file);
                 if (file){
                    for(let i=0;i<file.length;i++){

                        let reader = new FileReader();
                        reader.onload = function(event){

                            $('#previmg').append("<div id='a"+i+"' class='m-2' style='height:150px;width:150px'><img src='"+event.target.result+"'class='w-75'><span class='removeprodphoto m-2' style='position:absolute;font-size:25px' data-attr='"+i+"'>x</span></div>")

                         }

                        reader.readAsDataURL(file[i]);

                    }
                 }

            })

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


$('#add_product').on('submit',function(e){
             e.preventDefault()

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
                    url: "{{route('adminAddProduct')}}",
                    data:new FormData(this),
                    contentType:false,
                    cache:false,
                    processData:false,

                    success: function(result){
                        $('.alert-success').removeClass("d-none").show();

                        $('#rezult').html(result)
                    },
                    error: function(data) {
                // console.log(data)
                $(".object").html('');
                        var errors = data.responseJSON.errors;
                        console.log(errors)
                        $.each(errors, function (index, value) {
                            console.log(index+'----'+value)
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
