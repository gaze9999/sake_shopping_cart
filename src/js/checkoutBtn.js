creditCard.on('mouseup', function() {
  let thisBtn = $(this)
  creditCard.addClass('btn_notSelected')

  creditCard.hasClass('btn_selected') &&
    creditCard.removeClass('btn_selected')

  thisBtn.removeClass('btn_notSelected')
  thisBtn.addClass('btn_selected')
})

checkOut.on('mouseup', function() {
  let cardType = creditCard.siblings('.btn_selected').data('card')

      if (cardType == undefined) {
        alertTemp2('還沒選擇信用卡')
      } else {
        checkCardInfo()
      }
})