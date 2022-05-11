
<div id="searchResults12" class="search-results-block">
    @foreach ($prod1 as $brand_name)   
    <div class="media align-items-center align-items-lg-start text-center text-lg-left flex-column flex-lg-row">
        <div class="mr-2 mb-3 mb-lg-0">  <img src="@if(isset($brand_name->product_photos) && isset($brand_name->product_photos[0])) {{route('getFile',['path' => $brand_name->product_photos[0]['img_path']])}} @endif" width="150" height="150" alt=""> </div>
     <div class="media-body">
         <h6 class="media-title font-weight-semibold" style="text-align:inherit;"><a href="#" data-abc="true" style="font-weight:bold;color:black">{{$brand_name->name}} {{$brand_name['product_chars'][1]['pivot']['value']}}</a> </h6>
         @if ($brand_name['product_chars'][4]['name'])
         <p class="mb-3">{{$brand_name['product_chars'][4]['name']}}:{{$brand_name['product_chars'][4]['pivot']['value']}}</p>
         @endif
         @if ($brand_name['product_chars'][5]['name'])
         <p class="mb-3">{{$brand_name['product_chars'][5]['name']}}:{{$brand_name['product_chars'][5]['pivot']['value']}}</p>
         @endif
         @if ($brand_name['product_chars'][6]['name'])
         <p class="mb-3">{{$brand_name['product_chars'][6]['name']}}:{{$brand_name['product_chars'][6]['pivot']['value']}}</p>
         @endif
         @if ($brand_name['product_chars'][7]['name'])
         <p class="mb-3">{{$brand_name['product_chars'][7]['name']}}:{{$brand_name['product_chars'][7]['pivot']['value']}}</p>
         @endif
         @if ($brand_name['product_chars'][8]['name'])
         <p class="mb-3">{{$brand_name['product_chars'][8]['name']}}:{{$brand_name['product_chars'][8]['pivot']['value']}}</p>
         @endif
     </div>
     <div class="mt-3 mt-lg-0 ml-lg-3 text-center  respncive">
         <h3 class="mb-0 font-weight-semibold" style="color:red;">{{$brand_name->sale_price}} Р.</h3>
         <div> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
         <div class="text-muted">2349 reviews</div><button  class="new_one  mt-4 "><i class="icon-cart-add mr-2"></i> Add to cart</button>
     </div>
    </div>
    <hr>
    @endforeach
    </div>





