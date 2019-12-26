let filterR = $('.filter_region');

filterR.on('mouseup', '.filter_btn', function(){
  console.log($(this).data('region'))
})