carGoCheckout.on('mouseup',(e) => {
  let capIds = [],
      itemQtys = []

  cartHiddenQty.each(e => {
    itemQtys.push(parseInt(cartHiddenQty[e].value))
  })

  cartHiddenSid.each(e => {
    capIds.push(parseInt(cartHiddenSid[e].value))
  })

  updateSession(capIds, itemQtys)

  getLoginStatus()
})