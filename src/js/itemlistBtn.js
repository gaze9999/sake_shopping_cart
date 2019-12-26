getVarieties()

itemTree.on('mouseup', '.tree_btn', function() {
  // itemList.html("")
  vid = $(this).data('vid')
  getVarieties(vid)
  for (let i in dataLength) {
  }
})

filterR.on('mouseup', '.filter_btn', function() {
  // console.log($(this).data('region'))
  filterItem()
}