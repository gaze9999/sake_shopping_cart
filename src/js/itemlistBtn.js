getVarieties()
getTree()

itemTree.on('mouseup', '.tree_btn', function() {
  vid = $(this).data('vid')
  vcat = $(this).data('vcat')
  getVarieties(vcat, vid)
})

filterRCbox.on('change', function() {
  $(this).toggleClass('checked')
  let rids = ""
  $('.filter_region .filter_checkbox.checked').each( function() {
    let Selected = $(this).data('region')
    rids += Selected + ", "
  });
  // console.log('rids: ' + rids)
  // filterItem()
})

