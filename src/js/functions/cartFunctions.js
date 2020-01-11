getCart()

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

function getCart() {
  fetch('./func/func-getCart.php', {
    method: "PUT",
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
    // console.log(json)
    cartItems.html('')

    for (let i in json) {
      // 價格換算
      let iCurr = json[i][0]['price'].substr(0, 3),
          iPrice = json[i][0]['price'].slice(3)
          capaid = json[i][0]['sId']
          iCurr == 'JPY' ?
          iPrice = parseInt(iPrice * 0.27) :
          iPrice = parseInt(iPrice)

      cartItems.append(
        `<tr class="cart_row_data" data-cartRow="${i}">
          <th class="cart_row_count" scope="row" data-row="${i}">${parseInt(i)+1}</th>
          <td class="d-flex center_all">
          <a href="./itemDetails.php?id=${json[i][2]['itemId']}">
            <picture class="d-flex cart_table_pic">
              <img class="cart_table_img" src="./img/items/pics/${json[i][0]['bId']}/${json[i][2]['itemId']}/${json[i][0]['imgName']}"
              alt="${json[i][0]['itemName']}"
              onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
            </picture>
          </a>
          </td>
          <td class="cart_item_name">
            <a href="./itemDetails.php?id=${json[i][2]['itemId']}">
              ${json[i][0]['itemName']}
            </a>
          </td>
          <td class="cart_item_cap">
            ${json[i][0]['capacity']}
          </td>
          <td class="cart_item_price">
            ${iPrice}
          </td>
          <td class="d-flex center_all cart_item_qty">
            <input class="cart_item_minus item_counts_btn" type="button" value="-">
            <div class="d-flex px-4 center_all cart_item_hold"
              type="number" data-qty="${json[i][1]['itemQty']}">${json[i][1]['itemQty']}
            </div>
            <input class="cart_item_plus item_counts_btn" type="button" value="+">
          </td>
          <td>
            <a class="btn cart_table_remove" data-itemId="${parseInt(i)}" role="button">刪除</a>
          </td>
          <input type="hidden" class="cart_row_total" value="${iPrice * json[i][1]['itemQty']}">
        </tr>`
      )
    }

  }).then(e => {
  countTotal()
  itemRemove = $('.cart_table_remove'),
  cartMinus = $('.cart_item_minus'),
  cartPlus = $('.cart_item_plus'),
  cartHold = $('.cart_item_hold'),
  cartTotal = $('.cart_row_total'),
  cartPrice = $('.cart_item_price')
  
  cartMinus.on('mouseup', function() {
    let thisRow = $(this).parents('tr').data('cartrow'),
        thisDiv = cartHold.eq( thisRow ),
        thisTotal = cartTotal.eq( thisRow ),
        thisPrice = $.trim( cartPrice.eq( thisRow ).text() ),
        thisQty = parseInt( thisDiv.data('qty') )

    thisQty > 1 ? thisQty -= 1 : cartPlus
    thisDiv.data('qty', thisQty)
    thisDiv.html(thisQty)
    thisTotal.val( parseInt(thisPrice) * parseInt(thisQty) )
    countTotal()
  })

  cartPlus.on('mouseup', function() {
    let thisRow = $(this).parents('tr').data('cartrow'),
        thisDiv = cartHold.eq( thisRow ),
        thisTotal = cartTotal.eq( thisRow ),
        thisPrice = $.trim( cartPrice.eq( thisRow ).text() ),
        thisQty = parseInt( thisDiv.data('qty') )

    thisQty < 99 ? thisQty += 1 : cartMinus
    thisDiv.data('qty', thisQty)
    thisDiv.html(thisQty)
    thisTotal.val( parseInt(thisPrice) * parseInt(thisQty) )
    countTotal()
  })
  
  clearCart.on('mouseup', ()=> {
    alertTemp('確定要全部清除嗎?')
    $('#remove_e').val($(this).data('itemid'))
    $('.remove_btn').on('mouseup', function(){
      $(this).val() == 'yes' && clearItem()
      $('.remove_alert').remove()
      getCart()
      // countTotal()
    })
  })
  
  itemRemove.on('mouseup', function() {
    alertTemp('確定要刪除嗎?')
    let removeE = $('#remove_e'),
        removeId = $(this).data('itemid')
    removeE.val( removeId )
    $('.remove_btn').on('mouseup', function(){
      if ($(this).val() == 'yes') {
        removeItem()
        rowNum.eq( removeId ).remove()
      }
      removeId = ""
      $('.remove_alert').remove()
      getCart()
      // countTotal()      
    })
  })

  }).catch(error => {
  console.log('getDetails() request failed:', error);
  console.log(error.response);
  });
}