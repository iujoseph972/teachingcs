// Plugin written by Munir Safi

$(document).ready(function() {
    // track our modal div
    var id;
    $('[data-type=modal-u]').each(function() {
      $(this).hide();
    });
    //select all the a tag with name equal to modal
    $('a[name=modal-u]').click(function(e) {
        //Cancel the link behavior
        e.preventDefault();

        $('body').addClass('modal-u');

        //Get the a tag
        id = $(this).attr('href');

        //Get the screen height and width
        var maskHeight = $(document).height();
        var maskWidth = $(window).width();

        // add the mask to the page
        $('body').prepend('<div id="mask"></div>');

        //Set height and width to mask to fill up the whole screen
        $('#mask').css({'width': maskWidth,'height': maskHeight});

        //transition effect
        $('#mask').show();

        // Get the window height and width
        var windowHeight = $(window).height();
        var windowWidth = $(window).width();

        // add the window class
        $(id).addClass('window');

        // Set the popup window to center
        if($(id).height() > $(window).height()) {
          $(id).css('top', '40px');
        } else {
          $(id).css('top',  (windowHeight/2-$(id).height()/2) - 20);
        }
        $(id).css('left', (windowWidth/2-$(id).width()/2) - 20);

        // Transition effect
        $(id).show();

        if($(id).height() > $(window).height()) {
          $(id).css('bottom', '40px');
        }

        // Handle window resizing
        window.onresize = function() {
          var maskHeight = $(document).height();
          var maskWidth = $(document).width();
          $('#mask').css({'width': maskWidth, 'height': maskHeight});
          var windowHeight = $(window).height();
          var windowWidth = $(window).width();
          $('body').addClass('modal-u');
          if($(id).height() > windowHeight) {
            $(id).css('top', '40px');
            $(id).css('bottom', '40px');
          } else {
            $(id).css('top',  (windowHeight/2-$(id).height()/2) - 20);
            $(id).css('bottom', 'initial');
          }
          $(id).css('left', (windowWidth/2-$(id).width()/2) - 20);
        }

    });

    // if close button is clicked
    $(document).on('click', '.close', function (e) {
      // Cancel the link behavior
      e.preventDefault();
      // hide the modal
      $('.window').hide();
      // remove the mask
      $('#mask').remove();
      // remove styles from body
      $('body').removeClass();
    });

    //if mask is clicked
    $(document).on('click', '#mask', function () {
        $(this).remove();
        $('.window').hide();
        $('body').removeClass();
    });

});
