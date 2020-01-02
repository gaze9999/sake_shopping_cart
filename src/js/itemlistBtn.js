getVarieties()
getTree()

itemTree.on('mouseup', '.tree_btn', function() {
  vid  = $(this).data('vid')
  vcat = $(this).data('vcat')
  filterCheckbox()
})

filterRCbox.on('change', function() {
  $(this).toggleClass('checked')
  filterCheckbox()
})