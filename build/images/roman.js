//preview image
function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
  
      //check if img
      var imgExt = ["image/gif", "image/jpeg", "image/png"];
      if($.inArray(input.files[0].type, imgExt) > 0) {
        reader.onload = function(e) {
          $(input).siblings('a').attr('href', '').find('i').hide();
          $(input).siblings('img').attr('src', e.target.result);
        } 
      }

      // //check if pdf  
      // if(input.files[0].type == "application/pdf") {
      //   reader.onload = function(e) {
      //     $(input).siblings('a').attr('href', e.target.result);
      //     $(input).siblings('img').attr('src', '');
      //   } 
      // } 
  
      reader.readAsDataURL(input.files[0] );
    }
  }
  
  $(document).on('change', '.upload-file input',function() {
    //check if pdf  
    var val = $(this).val();
    var file_type = val.substr(val.lastIndexOf('.')).toLowerCase();
    
    if(file_type == '.pdf' ) {
      $(this).siblings('a').attr('href', $(this).val());
      $(this).siblings('img').attr('src', '');
    } else {
      readURL(this);
    }
  });

 

$('body').append($('.preloader'))

$(document).ready(function(){
  $('.preloader').remove()
})