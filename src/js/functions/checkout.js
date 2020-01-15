function getDatatoFinal(arr) {
  fetch('./func/func-cardData.php', {
    method: "PUT",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify(
      {cardData: arr}
    )]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      // return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
    // console.log(json)

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}