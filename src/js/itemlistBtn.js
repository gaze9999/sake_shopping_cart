getVarieties()
getTree()

itemTree.on('mouseup', '.tree_btn', function() {
  vid  = ""
  vcat = ""
  rids = ""
  vid  = $(this).data('vid')
  vcat = $(this).data('vcat')
  $('.filter_region .filter_checkbox.checked').each( function() {
    let Selected = $(this).data('region')
    rids += Selected + ", "
  });
  rids = rids.substring(0, rids.length-2)
  getVarieties(vcat, vid, "", rids)
})

filterRCbox.on('change', function() {
  $(this).toggleClass('checked')
  let rids = ""
  $('.filter_region .filter_checkbox.checked').each( function() {
    let Selected = $(this).data('region')
    rids += Selected + ", "
  });
  rids = rids.substring(0, rids.length-2)
  filterItem(vcat, vid, "", rids)
})