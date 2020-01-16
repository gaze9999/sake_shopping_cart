$(document).ready(function() {
  itemGetList()
  getRTree()
})


filterRCbox.on('change', function() {
  $(this).toggleClass('checked')
  filterCheckbox()
})