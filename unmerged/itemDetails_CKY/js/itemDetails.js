// 其他酒款輪播
// $('.owl-carousel').owlCarousel({
//     loop:true,
//     margin:10,
//     nav:true,   /* 控制列 */
//     autoWidth:true,   /* 可自行設定輪播寬度 */
//     items:5,  /* 一頁出現的張數 */
//     autoplay:false,  /* 自動輪播 */
//     autoplayTimeout:6000,  /* 輪播速度 */
//     autoplayHoverPause:true
//     });
//     $('.play').on('click',function(){
//     owl.trigger('play.owl.autoplay',[1000])
//     })
//     $('.stop').on('click',function(){
//     owl.trigger('stop.owl.autoplay')
//     })

$('.owl-carousel').owlCarousel({
    loop: true,
    items:5,
    autoplay: false,
    autoplayTimeout: 3000,
    dots: false,
    nav: true,
    navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
});

// AOS特效
$(document).ready(function (){
  AOS.init();
})
// $(function(){
//   AOS.init();
// })