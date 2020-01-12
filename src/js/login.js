let login = $('.login_btn')
    usrid = $('#login')
    usrpwd = $('#password')

function loginBtn(uid, pwd) {
  fetch('./func/func-login.php', {
    method: "POST",
    headers: {'Content-Type': 'application/json',
              'Accept': 'application/json'},
    body: [JSON.stringify({
      'userId': uid,
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

  }).catch(error => {
    console.log('getDetails() request failed:', error);
    console.log(error.response);
  });
}

login.on('mouseup', ()=> {
  let uid = $.trim( usrid.val().toLowerCase() )
      pwd = $.trim( usrpwd.val().toLowerCase() )
  // console.log(uid)
  loginBtn(uid, pwd)
})