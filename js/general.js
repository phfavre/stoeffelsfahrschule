
$('a[href^="#"]').click(function() {
    var target = parseInt($(this).offset().top);
    $('html, body').animate({
      scrollTop: target - 150
    }, "slow");
    return false;
});