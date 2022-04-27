$("#icons").hide()
$(".cont_lg").hide()
$("#menu_img").on("click", function (){
$("#menu_img").hide()
$(".cont_lg").show()
$("#icons").show()
})
$("#icons").on("click", function (){
    $("#menu_img").show("fast")
    $("#icons").hide()
    $(".cont_lg").hide()
})

$(".myclick").click(function(){
    $('.click_m:first-child').click();
  });

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
var modal = document.getElementById("myModal");

var btn = document.getElementById("myBtn");

var span = document.getElementsByClassName("close")[0];

btn.onclick = function() {
  modal.style.display = "block";
}

span.onclick = function() {
  modal.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

