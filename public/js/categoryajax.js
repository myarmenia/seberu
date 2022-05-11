function hideShowEye(cl){

    let atType = 'password';
    atType = $('.' + cl).attr('type') == 'password' ? 'text' : 'password';
    $('.' + cl).attr('type',atType);

  }

const tabItems = Array.from(document.querySelectorAll('.tab-item'))
const contentItems = Array.from(document.querySelectorAll('.content-item'))

const clearActiveClass = (element, className = 'is-active') => {
element.find(item => item.classList.remove(`${ className }`))
}

const setActiveClass = (element, index, className = 'is-active') => {
element[index].classList.add(`${ className }`)
}

const checkoutTabs = (item, index) => {
item.addEventListener('click', () => {

  if (item.classList.contains('is-active')) return
  console.log(item)

  clearActiveClass(tabItems)
  clearActiveClass(contentItems)

  setActiveClass(tabItems, index)
  setActiveClass(contentItems, index)
})
}

tabItems.forEach(checkoutTabs)


     $(".click_m").click(function(){
       if($(this).hasClass('active')){
           $(this).removeClass('active')
       }else{
          $(".click_m").removeClass('active')
          $(this).addClass('active')
       }
     });



     (function ($) {

        $('#price-range-submit').hide();

          $("#min_price,#max_price").on('change', function () {

            $('#price-range-submit').show();

            var min_price_range = parseInt($("#min_price").val());

            var max_price_range = parseInt($("#max_price").val());

            if (min_price_range > max_price_range) {
              $('#max_price').val(min_price_range);
            }

            $("#slider-range").slider({
              values: [min_price_range, max_price_range]
            });

          });


          $("#min_price,#max_price").on("paste keyup", function () {

            $('#price-range-submit').show();

            var min_price_range = parseInt($("#min_price").val());

            var max_price_range = parseInt($("#max_price").val());

            if(min_price_range == max_price_range){

                  max_price_range = min_price_range + 100;

                  $("#min_price").val(min_price_range);
                  $("#max_price").val(max_price_range);
            }

            $("#slider-range").slider({
              values: [min_price_range, max_price_range]
            });

          });


          $(function () {
            $("#slider-range").slider({
              range: true,
              orientation: "horizontal",
              min: 0,
              max: 10000,
              values: [0, 10000],
              step: 100,

              slide: function (event, ui) {
                if (ui.values[0] == ui.values[1]) {
                    return false;
                }

                $("#min_price").val(ui.values[0]);
                $("#max_price").val(ui.values[1]);
              }
            });

            $("#min_price").val($("#slider-range").slider("values", 0));
            $("#max_price").val($("#slider-range").slider("values", 1));

          });




      })(jQuery);
