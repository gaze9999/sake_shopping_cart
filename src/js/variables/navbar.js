let navbar = $('.navbar'),
    navBtn = $('.navbar-toggler'),
    navLink = $('.nav-link'),
    navItem = $('.nav-item'),
    navHome = $('.nav_a_home'),
    mainContain = $('#main_contain'),
    navNav = $('.navbar-nav'),    
    goBack = $('.goBack')




goBack.on('mouseup', ()=> {
  history.go(-1)
})