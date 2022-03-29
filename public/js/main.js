$("#icons").hide()
$(".cont_lg").hide()
$("#menu_img").on("click", function (){
$("#menu_img").hide()
$(".cont_lg").show()
$("#icons").show()
})
$("#icons").on("click", function (){
    $("#menu_img").show()
    $("#icons").hide()
    $(".cont_lg").hide()
})

$("#ic").hide()
$(".cont_lg").hide()
$(".menu1_img1").on("click", function (){
    console.log(111);
$(".menu1_img1").hide()
$(".cont_lg").show()
$("#ic").show()
})

$("#ic").on("click", function (){
    $(".menu1_img1").show()
    $("#ic").hide()
    $(".cont_lg").hide()
})
