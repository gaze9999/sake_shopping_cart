let treeId = $('.tree_id');
let cId = treeId.data('cid')
let pId = treeId.data('pid')

// data = treeId.data()
data = JSON.stringify(treeId.data())
// console.log(data)

function getItem() {
  fetch('./tpl/func-getItems.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json'},
    body: data
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
      // return res.text();
      // return res.status;
      // return res;
    } else {
      let error = new Error(response.statusText)
      error.response = response;
      throw error.Content-Type;
    }

  }).then(json => {
    console.log(json);

  }).then(data => {
    console.log(data)

  }).catch(error => {
    // console.log('request failed', error);
    // return error.response.json();

  }).then(errorData => {
    // console.log(errorData);
  });
}

getItem()