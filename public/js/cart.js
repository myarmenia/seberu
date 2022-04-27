
let count=0
$('.addToCart').on('click',function(e){
    e.preventDefault()
    let color_array=[]
    let color=$('.color')

    for(i=0;i<color.length;i++){

        if($(color[i]).is(':checked')){

            color_array.push($(color[i]).val())
        }
    }

      console.log(color_array)





         let prod_id=$(this).attr('data-attribute')
         $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
    });
    console.log("simon")

    $.ajax({
            method: "POST",
            url: "/add-to-cart",
            data: {prod_id, color_array},
            success: function(result){
                console.log(result)
                if(result=="inserted"){
                    $('.badge-counter').removeClass('d-none').css('position','absolute')
                    count++
                    $('.badge-counter').text(count)
                }
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
})
