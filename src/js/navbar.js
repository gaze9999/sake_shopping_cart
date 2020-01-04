navItem.on('mouseup', function() {
  let page = $(this).data('page')
  $(this).toggleClass('active')
  mainContain.html('')
  mainContain.load(`./${page}.php`)
})