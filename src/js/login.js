let login = $('.login_btn'),
    usrid = $('#login'),
    usrpwd = $('#password'),
    regGen = $('.register_gender')

login.on('mouseup', ()=> {
  let uid = $.trim( usrid.val().toLowerCase() )
      pwd = $.trim( usrpwd.val().toLowerCase() )
  loginBtn(uid, pwd)
  // location.reload()
})

regGen.on('mouseup', function() {
  let thisBtn = $(this)
  btnSingleSelect(regGen, thisBtn)
})

function loginBtn(uid, pwd) {
  fetch('./func/func-login.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'userId': ($.trim(uid)).toLowerCase(),
      'userPwd': pwd
    })]
  }).then(res => {
    if (res.status >= 200 && res.status < 300) {
      return res.json();
    } else {
      let error = new Error(res.statusText);
      error.response = response;
      throw error.Content-Type;
    }
  }).then(json => {
    let statusCode = json;
    switch (parseInt(statusCode)) {
      case 1:
        alertTemp2('登入成功!')
        break;
      case 2:
        alertTemp2('登入失敗!')
        break;
      case 3:
        alertTemp2('欄位未填!')
        break;
    }

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}