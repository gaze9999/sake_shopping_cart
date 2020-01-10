function removeItem() {
  fetch('./func/func-cartRemoveItem.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({'itemid': $('#remove_e').val()})]

  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function clearItem() {
  fetch('./func/func-clearCart.php', {
    method: "GET",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'}
              
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res;
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }

  }).then(e => {
    cartItems.html('')

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

function alertTemp(title) {
  $('main').append(
    `<div class="fixed-top remove_alert">
    <div class="row h-100 w-100">
      <div class="d-flex flex-column col-4 center_all remove_box">
          <h4>${title}</h4>
          <div class="btn-group remove_btn_group" role="group" aria-label="Basic example">
            <button type="button" class="btn remove_btn remove_yes" value="yes">是</button>
            <button type="button" class="btn remove_btn remove_no" value="no">不</button>
          </div>
          <input class="hidden" id="remove_e" type="hidden" value=""></input>
      </div>
    </div>
  </div>`
  )
}

function countTotal() {
  rowTotal = $('.cart_row_total')
  rowNum = $('.cart_row_data')
  priceCount = 0

  rowTotal.each(e => {
    priceCount += parseInt(rowTotal[e].value)
  })

  totalPrice.html(priceCount)
}