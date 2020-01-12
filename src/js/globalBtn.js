goBack.on('mouseup', ()=> {
  history.go(-1)
})

logout.on('mouseup', function() {
  alertTemp('確定要登出嗎?')
  let removeE = $('#remove_e'),
      removeBtn = $('.remove_btn'),
      removeAlert = $('.remove_alert')
  removeBtn.on('mouseup', function() {
    if ($(this).val() == 'yes') {
      logOutBtn()
      location.reload()
    }
    removeAlert.remove()
  })
})