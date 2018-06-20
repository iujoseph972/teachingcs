$(document).ready(function() {

  // This is the javascript file that is attached to every page of the site
  // Only major, website-wide events should be placed in here. Specific page
  // events should be placed in specific page files.
  // Author: Munir Safi

  // Handle window resizing in
  $(window).resize(function() {
    if($(window).width() > 768) {
      $('#mobilemenu').removeClass('active');
      $.sidr('close', 'mobile');
      $('#mobileform').fadeOut(200);
    }
  });

  // Display the profile info dropdown when the user clicks on their name in the topbar
  $('#myprofile').on('click', function() {
    $('.dropdown.profile').show();
  });

  // If the user clicks outside of the dropdown, then close the container.
  $(document).on('mousedown', function(e) {
    var dropDiv = $('.dropdown.profile');

    if(!dropDiv.is(e.target) && dropDiv.has(e.target).length === 0) {
      dropDiv.hide();
      dropDiv.unbind('click', document);
    }
  });

  // Sidr plugin to handle mobile navigation
  // TODO: Might change this and develop something myself, seems like an archaic plugin to keep using long-term
  $('#mobilemenu').sidr({
      name: 'mobile',
      side: 'right',
      source: '#navbar ul',
      speed: 250,
      onOpen: function(){
        $('#mobilemenu').addClass('active');
        $('body').bind('click', function (e) {
          if (!$(e.target).is('#mobile')) {
            $.sidr('close', 'mobile');
          }
          return false;
        });
      },
      onClose: function(){
        $('#mobilemenu').removeClass('active');
        $('body').unbind('click');
      }
    });

});
