let treeId = $('.tree_id'), jsonData;

// data = treeId.data()
data = JSON.stringify(treeId.data())
// console.log(data)

function getItem(num) {
  fetch('./tpl/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'text/html'},
    body: data
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }

  }).then(json => {
    console.log(json[num])

  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();
  });
}

// getItem()

function pasteData(){
  console.log(getItem(10))
}

pasteData()