let treeId = $('.tree_id');

// data = treeId.data()
data = JSON.stringify(treeId.data())
// console.log(data)

function getItem() {
  fetch('./tpl/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'text/html'},
    body: data
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
      // return res.text();
      // return res.status;
      // return res;
      // console.log(res.json())
    } else {
      let error = new Error(res.statusText);
      error.response = res;
      throw error.Content-Type;
    }

  }).then(json => {
    console.log(json)

  }).catch(error => {
    console.log('request failed:', error);
    // return error.response.json();

  }).then(errorData => {
    // console.log(errorData);
  });
}

getItem()
