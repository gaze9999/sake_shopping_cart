addCart.on('mouseup', ()=> {
  fetch('./func/func-addCart.php', {
    method: "GET",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'}
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