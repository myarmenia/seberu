$("#slider-range,#price-range-submit").on("click", function () {
    var min_price = $('#min_price').val();
    var max_price = $('#max_price').val();
    console.log({min_price, max_price})
    if(min_price == 0) {
        // console.log(min_price)
        window.location.reload(true)
    }
    $(".filter_show").css({'display':'none'});
    $.get(
        "/searchprice",
        {min_price,max_price},
        function (result) {
          $("#searchResults").html(result);
        }
    )
    });


    $(".checkbox").on("click", function () {
    var keyword = $(this).val();
    $(".filter_show").css({'display':'none'});
    $.get(
        "/search_mobile_name",
        {keyword},
        function (result) {
          $("#searchResults12").html(result);
        }
    )
    });

    $(".checkbox1").on("click", function () {
        var keyword = $(this).val();
        $(".filter_show").css({'display':'none'});
        $.get(
            "/search_mobile_number",
            {keyword},
            function (result) {
              $("#searchResults13").html(result);
            }
        )
        });

        $(".checkbox2").on("click", function () {
            var brande = $(this).val();
            $(".filter_show").css({'display':'none'});
            $.get(
                "/search_mobile_brand",
                {brande},
                function (result) {
                  $("#searchResults14").html(result);
                }
            )
            });
