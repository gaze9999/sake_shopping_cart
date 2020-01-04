let pageAc = $('.page_ac'),
    acBtn = $('.ac_btn'),
    yoo = new Audio()
    yoo.src = './audio/yoo_119.mp3'

yoo.onended = () => {
  location = './main.php'
}