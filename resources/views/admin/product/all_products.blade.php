@extends('adminlte::page')

@section('content_header')

@stop

@section('content')
<div id="tamanho" class="row">
  <div id="tamanho" class="col-12">

    <div id="tamanho" class="card">
      <div id="tamanho" class="card-header">
        <h3 class="card-title">Продукты </h3>
        {{-- @if($parents)
        <span class="badge">
          <div class="row">
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parent_id']])}}">{{$parents['name']}}</a>
            </div>
            @if($parents['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parent_id']])}}">{{$parents['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['name']}}</a>
            </div>
            @if($parents['parents']['parents']['parents']['parents'])
            <div class="col">
              <a href="{{route('categories',['id' =>$parents['parents']['parents']['parents']['parents']['parent_id']])}}">{{$parents['parents']['parents']['parents']['parents']['name']}}</a>
            </div>
            @endif
            @endif
            @endif
            @endif
          </div>
        </span>
        @endif --}}

        {{-- @can('create_category')
        <div class="card-tools">
        <span class="badge badge-primary">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
               Add Category
          </button>
        </span>
        </div>
        @endcan --}}
    </div>

      <div id="tamanho" class="card-body">

        <div class="alert alert-success d-none my-2">
            <div id="rezult"></div>
        </div>



        <table id="example1 tabelinha" class="table table-bordered table-striped" >
          <thead>
          <tr>
              <th>ID</th>
              <th>Имя</th>
              <th>Количество</th>
              <th>Цена</th>
              <th>Цена продажи</th>
              <th>Описание</th>
              <th class="text-center">Действие</th>
          </tr>
          </thead>
          <tbody>
            @foreach($all_product as $item)
            <tr>
                <td>{{$item['id'] ?? null}}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['quantity']}}</td>
                <td>{{$item['price']}}</td>
                <td>{{$item['description']}}</td>
                <td>{{$item['description']}}</td>
                <td class="text-center">
                    <a href="{{ route('adminEditProduct',$item->id)}}"><i class="fa fa-edit me-2"></i></a>
                    <a href="#" id="{{$item['id']}}" class="delet_prod"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            @endforeach
            {{-- @if($products)
            @foreach($products as $item)
          <tr>
            <td>{{$item['id'] ?? null}}</td>
            <td>
              @can('edit_category')
                <input type="text" class="form-control" value="{{$cat['name'] ?? null}}" readonly="true" ondblclick="this.readOnly=!this.readOnly" onchange="changeName('{{$cat['id']}}',this.value)">
              @else
                {{$['name'] ?? null}}
              @endcan
            </td>
            <td>
              <div class="row">
                <div class="col">
                  <a href="{{route('categories',['id' =>$cat['id']])}}" class="link"><i class="fa-solid fa-angle-down"></i></a>
                </div>
                <div class="col">

                     <a href="{{ route('editCategories',$cat->id)}}">edit</a>
                </div>
                @can('delete_category')
                <div class="col">
                  <form class="" action="{{route('deleteCategories')}}" method="post">
                      @method('delete')
                      @csrf
                      <input type="text" hidden name="id" value="{{$cat['id']}}">
                      <button type="submit" class="btn-xs btn-danger">
                        <i class="fa-solid fa-trash"></i>
                      </button>
                  </form>
                </div>
                <div class="col">
                  @can('edit_category')
                  <form class="" action="{{route('spamCategories')}}" method="POST">
                    @csrf
                    @method('patch')
                    <input type="text" name="id" value="{{$cat['id']}}" hidden>
                  <button class="btn-sm bg-primary">
                      <i class="fas fa-edit"></i>@if($cat['spam'])
                      Un
                      @endif
                      Spam
                  </button>
                  </form>
                  @endcan
                </div>
                @endcan
              </div>
            </td>
          </tr>
          @endforeach
          @endif --}}
        </table>
      </div>
    </div>
  </div>
</div>

     <div class="modal" id="myModal">
        <div class="modal-dialog">
           <div class="modal-content">
              <div class="modal-header">
                 <h4 class="modal-title">Add Category</h4>
              </div>
              <div class="modal-body">
                <form action="{{route('createCategories',Request::get('id'))}}" method="POST">
                  <div class="form-group">
                      @csrf
                      <input type="text" name="name" value="" class="form-control">
                  </div>
              <div class="modal-footer">
                  <button class="btn btn-primary">Save</button>
                 <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
              </form>
           </div>
        </div>
     </div>

@stop

@section('css')
    <link rel="stylesheet" href=" {{mix ('css/app.css')}}">
@stop

@section('js')
<script>
    $('.delet_prod').on('click',function(e){
        e.preventDefault()
        let id=$(this).attr('id')
        $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
        });
        $.ajax({
                    type: "delete",
                    url: "{{ route('adminDeleteProduct')}}",
                    data: {id},
                    success: function(result){
                        console.log(result)
                        if(result=="Deleted"){
                            $('#'+id).parent().parent().remove()
                            $('.alert-success').removeClass("d-none").show();
                            $('#rezult').text('Продукт был успешно удален')
                        }

                    }
         })

    })
</script>

@stop
