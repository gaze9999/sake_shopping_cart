$(document).ready(()=> {
  fetch('./func/func-getCart.php', {
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
    // console.log(json)
    cartItems.html('')

    for (let i in json) {
      // 價格換算
      let iCurr = json[i][0]['price'].substr(0, 3)
      let iPrice = json[i][0]['price'].slice(3)
      capaid = json[i][0]['sId']
      iCurr == 'JPY' ?
        iPrice = parseInt(iPrice * 0.27) :
        iPrice = parseInt(iPrice)

      cartItems.append(
        `<tr class="cart_row_data" data-cartRow="${i}">
          <th class="cart_row_count" scope="row" data-row="${i}">${parseInt(i)+1}</th>
          <td class="d-flex center_all">
            <picture class="d-flex cart_table_pic">
              <img class="cart_table_img" src="./img/items/pics/${json[i][0]['bId']}/${json[i][2]['itemId']}/${json[i][0]['imgName']}"
              alt="${json[i][0]['itemName']}"
              onerror="this.onerror=null; this.src='./img/icons/main_icon.svg'">
            </picture>
          </td>
          <td class="cart_item_name" data-row="${i}">${json[i][0]['itemName']}</td>
          <td class="cart_item_cap" data-row="${i}">${json[i][0]['capacity']}</td>
          <td class="cart_item_price" data-row="${i}">${iPrice}</td>
          <td class="cart_item_qty" data-row="${i}">${json[i][1]['itemQty']}</td>
          <td>
            <a class="btn cart_table_remove" data-itemId="${parseInt(i)}" role="button">刪除</a>
          </td>
          <input type="hidden" class="cart_row_total" value="${iPrice * json[i][1]['itemQty']}">
        </tr>`
      )
    }
  itemRemove = $('.cart_table_remove')
  rowTotal = $('.cart_row_total')
  rowNum = $('.cart_row_data')
  let TotalPrice

  rowTotal.each(()=> {
    TotalPrice += parseInt(rowTotal.value)
  })

  // console.log($.type(TotalPrice))
  console.log(TotalPrice)
  totalPrice.html(TotalPrice)

  }).then(e => {

  itemRemove.on('mouseup', function() {
    alertTemp('確定要刪除嗎?')
    let removeE = $('#remove_e')
    let removeId = $(this).data('itemid')
    removeE.val( removeId )
    $('.remove_btn').on('mouseup', function(){
      if ($(this).val() == 'yes') {
        removeItem()
        rowNum.eq( removeId ).remove()
      }
      removeId = ""
      $('.remove_alert').remove()
    })
  })

  clearCart.on('mouseup', ()=> {
    alertTemp('確定要全部清除嗎?')
    $('#remove_e').val($(this).data('itemid'))
    $('.remove_btn').on('mouseup', function(){
      $(this).val() == 'yes' && clearItem()
      $('.remove_alert').remove()
    })
  })

  }).catch(error => {
  console.log('getDetails() request failed:', error);
  console.log(error.response);
  });
})