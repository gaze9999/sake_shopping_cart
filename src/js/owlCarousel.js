let owlRes = {
  0: {
    items: 1
  },
  320: {
    items: 1
  },
  560: {
    items: 2
  },
  960: {
    items: 3
  }
}

$(document).ready(() => {
  $('.know_carousel_post').owlCarousel({
    loop: true,
    autoplay: false,
    autoplayTimeout: 3000,
    dots: false,
    nav: true,
    navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')],
    responsive: owlRes
  })

  $('.detail_carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    dots: true,
    nav: false,
    items: 1,
    navText: [$('.owl-navigation .owl-nav-prev'), $('.owl-navigation .owl-nav-next')]
  })
})