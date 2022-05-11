// plus minus button click
    $('.action').on('click',function(){

        let cart_id=$(this).attr('data-cartid')
        let product_id = $(this).attr('data-attribute')
        let action_btn=''
        if($(this).attr('data-action')=="plus"){
             action_btn = $(this).parent().find('.qty').val()*1+1
        }else{
            action_btn =  $(this).parent().find('.qty').val()*1-1
            // clicing on minus button not allow to 0 value default set 1 qty and 1product
            if($(this).parent().find('.qty').val()==1){
                action_btn= 1
                product_amount=$(this).parent().find('.total_price').attr('data-price')
            }
        }

        let product_amount=$(this).parent().find('.total_price').attr('data-price')*action_btn

        $(this).parent().find('.qty').val(action_btn)
        $(this).parent().find('.total_price').val(product_amount)

        cart_update(cart_id,product_id,action_btn,product_amount)
        sum()

    })



function cart_update(cart_id,product_id,action_btn,product_amount){


        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
    });
        $.ajax({
            method: "POST",
            url: "/profile/increase_product_count",
            data: {cart_id,product_id, action_btn,product_amount},
            success: function(result){
                console.log(result)


            },
            error: function(data) {

                var errors = data.responseJSON.message;

                if(errors=="Unauthenticated."){
                    function f1(){
                        $('#exampleModal').modal('show')
                    }
                    $('#open_modal').on('click',f1())

                }
            }

        })
}





// getting total price
    function sum(){

        sumamount=0

        $('.total_price').each(function(){
            sumamount+=$(this).val()*1
        })
        $('#total_amount').html(sumamount)

    }
    sum()
// ---------------------------------------------------------

    // removing product from the cart--------------------------------
    $('.remove-from-cart').on('click',function(){

        let product_id = $(this).attr("data-id");
        // console.log( $(product_id).parent().parent())
             $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    method: "DELETE",
                    url: "/profile/remove-from-cart",
                    data: { product_id },
                    success: function(result){
                        $('#result').html(result)
                        $('#'+product_id).remove()
                        $('.alert-success').removeClass("d-none").show();
                        $('#rezult').text(result)
                        sum()
                    },
                    error: function(data) {

                        var errors = data.responseJSON.message;
                        console.log(errors)
                    }

                })
    })
    // ---------------------------------------------------------------
   


