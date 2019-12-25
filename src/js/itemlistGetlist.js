let itemList = $('.itemList_list .test'),
    itemTree = $('.itemList_tree'),
    jsonData;

function getItem(id) {
  fetch('./tpl/func-getItems.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [
      JSON.stringify({'cid': id})
    ]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }

  }).then(json => {
    // location.reload()
    // console.log(json.length)
    
    // json.forEach(e => {
      for (i=0; i<json.length; i++) {
      // console.log(json[i])
      sid = JSON.stringify(json[i]['itemName'])
      itemList.append(`${i+1}: ${sid.slice(1, sid.length-1)}<br>`)
    };
      
  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();
  });
}

// getItem()

// console.log(getItem())

itemTree.on('mouseup', '.tree_btn', function() {
  itemList.html("")
  cid = $(this).data('cid')
  // treeId.data('cid', cid)
  // console.log(treeId.data())
  getItem(cid)
})