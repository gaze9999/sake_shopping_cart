getVarieties()
getTree()

itemTree.on('mouseup', '.tree_btn', function() {
  // vid  = $(this).data('vid')
  // vcat = $(this).data('vcat')
  // filterCheckbox()
})

treeButton.on('mouseup', ()=> {
  console.log($(this).val())
  // filterCheckbox(rid = )
})

filterRCbox.on('change', function() {
  $(this).toggleClass('checked')
  filterCheckbox()
})