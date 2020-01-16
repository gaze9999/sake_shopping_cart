// click to scroll top
$('.move-up span').click(function () {
    $('html, body').animate({
        scrollTop: 0
    }, 1000)
})

// AOS Instance
$(document).onload(function(){
    AOS.init()
})