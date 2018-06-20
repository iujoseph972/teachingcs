$(document).ready(function() {

  //Assign Export Function
  $(".export").click(function() {
      var imageData = $('.image-editor').cropit('export', {
          type: 'image/jpeg',
          quality: 0.99,
          originalSize: false,
          exportZoom: 1,
          src: "../imgs/userpictures/"
      });
      // if there is no image, then there is an error, otherwise, we'll submit the image base64 data to the profilepic_upload script
      if($('.cropit-preview-image-container img').attr('src') === undefined) {
        console.log('error');
      } else {
        $.ajax({
          type: "POST",
          url: "/profile/profilepic_upload.php",
          data: {image: imageData},
          dataType: "json",
          success: function(data) {
            $('#profilepic img').attr('src', '/imgs/userpictures/' + data);
            $('#smallprofilepic img').attr('src', '/imgs/userpictures/' + data);
          }
        });
      }
  });

  // rotate the image clockwise
  $('.rotate-cw').click(function() {
    $('.image-editor').cropit('rotateCW');
  });

  // rotate the image counter clockwise
  $('.rotate-ccw').click(function() {
    $('.image-editor').cropit('rotateCCW');
  });

  $('#profilenav li').on('click tap', function() {
    $(this).addClass('active');
    $(this).siblings().removeClass('active');
  });

});
