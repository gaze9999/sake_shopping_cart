addCart.on('mouseup', ()=> {
  fetch('./func/func-addCart.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'iId': detailId.val(),
      'iQty': currectQty.data('qty'),
      'iPrice': itemPrice.data('price')
    })]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
})