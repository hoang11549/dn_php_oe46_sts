$(document).ready(function(){
  
    $('.disabled').click(function(){
      if ($(this).prop("checked") == true) {
        $('.for-disabled input:checkbox').prop('checked', false);
      }
    })
    $('.enabled').click(function(){
      if ($(this).prop("checked") == true) {
        $('.disabled').prop('checked', false);
      }
    })
  });
