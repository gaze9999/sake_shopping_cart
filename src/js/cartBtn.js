carGoCheckout.on('mouseup',(e) => {
  let capIds = [],
      itemQtys = []

      cartHiddenQty.each(e => {
    itemQtys.push(parseInt(cartHiddenQty[e].value))
  })

  cartHiddenSid.each(e => {
    capIds.push(parseInt(cartHiddenSid[e].value))
  })

  fetch('./func/func-goDelivery.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'capIds': capIds,
      'qtys': itemQtys
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

  location.href = './delivery.php';
})