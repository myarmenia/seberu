$(function() {
    {$('.dropdown').slideUp(); }
    $('.dropdown-toggle').css("font-weight", "500").click(function() { $(this).next('.dropdown').slideToggle();
 });

$(document).click(function(e){
   var target = e.target;
     if (!$(target).is('.dropdown-toggle') && !$(target).parents().is('.dropdown-toggle'))
     {$('.dropdown').slideUp(); }
 });
 });

 $(function () {
    $('.nav-toggle').on('click', function () {
      $('.sideNav').toggleClass('open');
    });
  });

