let treeId = $('.tree_id');
let cId = treeId.data('cid')
let pId = treeId.data('pid')

data = {
  cid: cId+"",
  pid: pId+""
}

console.log(JSON.stringify(data))
// console.log(JSON.stringify(treeId.data()))

// $.ajax({
//   url: "./tpl/func-getItems.php",
//   type: "POST",
//   method: "POST",
//   // async: true,
//   dataType: "json",
//   contentType: "application/json;charset=utf-8",
//   data: JSON.stringify(treeId.data()),
//   // data:{
//   //   cid: treeId.data('cid'),
//   //   pid: treeId.data('pid')
//   // }
// }).done(function(json){
//   console.log(json.info)
// }).fail(function(data, jqXHR , textStatus){
//   // console.log(data)
//   console.log(textStatus)
// })

fetch('./tpl/func-getItems.php', {
  method: "POST",
  headers: {
    'Accept': 'application/json',
    'Content-Type': 'application/json'
  },
  body: JSON.stringify(treeId.data())
}).then(function checkStatus(response) {
  if (response.status >= 200 && response.status < 300) {
      return response.json();
  } else {
      var error = new Error(response.statusText)
      error.response = response;
      throw error;
  }
}).then(function(json) {
    console.log(json.info);
}).catch(function(error) {
    console.log('request failed', error);
    return error.response.json();
}).then(function(errorData){
    console.log(errorData);
});