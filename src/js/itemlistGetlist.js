let treeId = $('.tree_id'), 
    itemList = $('.itemList_list'),
    jsonData;

// data = treeId.data()
treeData = JSON.stringify(treeId.data())
// console.log(data)

function getItem() {
  fetch('./tpl/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: treeData
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }

  }).then(json => {
    // console.log(json)
    itemList.html(JSON.stringify(json))
    jsonData = json
    return jsonData
  
  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();
  });
}

// getItem()

console.log(getItem())