carGoCheckout.on('mouseup',(e) => {
  let capIds = [],
      itemPrices = []
  
  

  console.log(capIds)
  console.log(itemPrices)
})

carGoCheckout.on('mouseup',(e) => {


  // fetch('./func/func-goDelivery.php', {
  //   method: "POST",
  //   headers: {'Content-Type': 'application/json',
  //             'Accept': 'application/json'},
  //   body: [JSON.stringify({
  //     'orderId': 0,
  //     'capIds': [capIds],
  //     '': 
  //   })]
  // }).then(res => {
  //   if (res.status >= 200 && res.status < 300) {
  //     return res.json();
  //   } else {
  //     let error = new Error(res.statusText);
  //     error.response = response;
  //     throw error.Content-Type;
  //   }
  // }).then(json => {

  // }).catch(error => {
  //   console.log('getDetails() request failed:', error);
  //   console.log(error.response);
  // });
})