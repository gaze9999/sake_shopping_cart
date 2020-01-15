creditCard.on('mouseup', function() {
  let thisBtn = $(this)
  creditCard.addClass('btn_notSelected')

  creditCard.hasClass('btn_selected') &&
    creditCard.removeClass('btn_selected')

  thisBtn.removeClass('btn_notSelected')
  thisBtn.addClass('btn_selected')
})

checkOut.on('mouseup', function() {
  let cardData = [],
      savCard  = 0,
      cardType = creditCard.siblings('.btn_selected').data('card'),
      crdName  = $.trim( cardName.val().toLowerCase() ),
      crdNum   = $.trim( cardNum.val().toLowerCase() ),
      crdExp   = $.trim( cardExp.val().toLowerCase() ),
      crdCvv   = $.trim( cardCvv.val().toLowerCase() ) 

      if (cardType == undefined) {
        alertTemp2('還沒選擇信用卡')
      } else {
        saveCard.prop('checked') &&
          (savCard = 1)
        cardData.push(
          {cardType: cardType},
          {cardName: crdName },
          {cardNum : crdNum  },
          {cardExp : crdExp  },
          {cardCvv : crdCvv  },
          {savCard : savCard }
        )
        getDatatoFinal(cardData)
      }
})