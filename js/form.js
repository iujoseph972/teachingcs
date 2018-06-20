$(document).ready(function() {

  // Validating an email using regex
  function validateEmail(email)  {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
  }

  // Validating password requirements
  function validatePass(pass) {
    if(pass.length < 8) {
      return false;
    }
  }

  // tracking errors
  var error = 0;

  // Handling our registration form to validate and push the data to the back-end
  // Additionally, we'll validate the username and password to see if those are available
  $("#registersubmit").click(function(e) {
    e.preventDefault()
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var username = $('#username').val();
    var email = $("#email").val();
    var password = $('#password').val();
    var cpassword = $('#confirmpwd').val();
    // the email input is emmpty, or the email isn't in a correct, valid format
    if (email == '' || validateEmail(email) == false) {
      $('h1').after('<div class="error invalidemail">Your email is not in a valid format. Please use a format similar to email@email.com.</div>');
      $('#email').css('border-color', '#f98080');
    } else if(password != cpassword) {
      $('h1').after('<div class="error invalidpass">Your passwords do not match.</div>');
      $('#password, #confirmpwd').css('border-color', '#f98080');
    // otherwise, we can successfully push the data to the backend register script
    } else {
      $.ajax({
        type: "POST",
        url: "/includes/register.inc.php",
        data: {firstname: firstname, lastname: lastname, username: username, email: email, confirmp: hex_sha512(cpassword), p: hex_sha512(password)},
        dataType: "json",
        success: function(data) {
          // everything was successful, so we'll inform the user their account was created and we'll take them to the login page
          // TODO: CREATE A BETTER TRANSITIONING TO THE SUCCESS MESSAGE AND STYLE THE FORM IN A BETTER FORMAT
          if(data.status == 'success') {
            $('h1').empty().html('Register success!');
            window.setTimeout(function() {
              window.location.href = '/login/';
            }, 3000);
          // there's an error #unkown
          } else if(data.status == 'error') {
            $('.invalidemail').remove();
            alert("Error on query!");
          // the user's passwords don't match
          } else if(data.status == 'passmismatch') {
            $('.invalidemail').remove();
            if(error === 0) {
              $('h1').after('<div class="error">Your passwords do not match!</div>');
            } else {
              $('.error').html('Your passwords do not match!')
            }
            error += 1;
            $('#password, #confirmpwd').css('border-color', '#f98080');
          // the user's email is already in use
          } else if(data.status == 'emailtaken') {
            $('.invalidemail').remove();
            if(error === 0) {
              $('h1').after('<div class="error">That email is already in use! Did you <a href="/forgotpassword/">forget your password?</a></div>');
            } else {
              $('.error').html('That email is already in use! Did you <a href="/forgotpassword/">forget your password?</a>')
            }
            error += 1;
            $('#email').css('border-color', '#f98080');
          // the user's username is already in use
          } else if(data.status == 'usernametaken') {
            $('.invalidemail').remove();
            if(error === 0) {
              $('h1').after('<div class="error">That username is already in use! Did you <a href="/forgotpassword/">forget your password?</a></div>');
            } else {
              $('.error').html('That username is already in use! Did you <a href="/forgotpassword/">forget your password?</a>')
            }
            error += 1;
            $('#username').css('border-color', '#f98080');
          }
          console.log(data.status);
        }
      });
    }
  });

  // Handling the login form
  $("#loginsubmit").click(function(e) {
    e.preventDefault()
    var email = $("#email").val();
    var password = $('#password').val();
    if (email == '' || validateEmail(email) == false) {
      $('h1').after('<div class="error invalidemail">Your email is not in a valid format. Please use a format similar to email@email.com.</div>');
      $('#email').css('border-color', '#f98080');
    } else {
      $.ajax({
        type: "POST",
        url: "/includes/login.inc.php",
        data: {email: email, p: hex_sha512(password)},
        dataType: "json",
        success: function(data) {
          if(data.status == 'success') {
            window.location.href = '/';
          } else if(data.status == 'error') {
            $('.invalidemail').remove();
            if(error === 0) {
              $('h1').after('<div class="error">Your email or password is incorrect! Please try again.</div>');
            }
            $('#email').css('border-color', '#f98080');
            $('#password').css('border-color', '#f98080');
            error += 1;
          }
        }
      });
    }
  });

  // Handling the forgot password form, step 1
  $("#forgotsubmit").click(function(e) {
    e.preventDefault()
    var email = $("#email").val();
    if (email == '' || validateEmail(email) == false) {
      console.log('emailerror');
    } else {
      $.ajax({
        type: "POST",
        url: "/includes/forgotpassword.inc.php",
        data: {email: email},
        dataType: "json",
        success: function(data) {
          if(data.status == 'success') {
            $('#formbox').empty();
            $('.extra').remove();
            $('h1').empty().html('Password Reset!');
            window.setTimeout(function() {
              window.location.href = '/resetpassword/';
            }, 3000);
          } else if(data.status == 'error') {
            console.log('test');
          }
        }
      });
    }
  });

  // Handling the forgot password reset page, step 2
  $("#resetsubmit").click(function(e) {
    e.preventDefault()
    var token = $("#token").val();
    var password = $('#password').val();
    var confirmpwd = $('#confirmpwd').val();
    if (token.length != 43) {
      $('h1').after('<div class="error invalidemail">Your token is invalid or doesn\'t exist. Please check your email for your token string again.</div>');
    } else if(validatePass(password) === false) {
      $(document).find('.error').remove();
      $('h1').after('<div class="error invalidemail">Your password is too short. Please ensure it is at least 8 characters.</div>');
    } else if(password != confirmpwd) {
      $(document).find('.error').remove();
      $('h1').after('<div class="error invalidemail">Your passwords do not match. Please try again.</div>');
    } else {
      $.ajax({
        type: "POST",
        url: "/includes/forgotpassword_reset.inc.php",
        data: {token: token, p: hex_sha512(password)},
        dataType: "json",
        success: function(data) {
          if(data.status == 'success') {
            $('#formbox').empty();
            $('.extra').remove();
            $('h1').empty().html('Reset Success!');
            window.setTimeout(function() {
              window.location.href = '/login/';
            }, 3000);
          } else if(data.status == 'error') {
            alert("an error has occurred");
          } else if(data.status == 'invalidtoken') {
            console.log('invalid token');
          }
        }
      });
    }
  });

  // Profile updating
  $("#updateprofile").click(function(e) {
    e.preventDefault()
    var email = $(".email").val();
    var firstname = $(".firstname").val();
    var lastname = $(".lastname").val();
    var phone = $(".phone").val();
    var bio = $(".bio").val();
    if (email == '' || firstname === '' || lastname === '' || validateEmail(email) == false) {
      console.log('emailerror');
    } else {
      $.ajax({
        type: "POST",
        url: "/includes/updateprofile.inc.php",
        data: {email: email, firstname: firstname, lastname: lastname, phone: phone, bio: bio},
        dataType: "json",
        success: function(data) {
          if(data.status == 'success') {
            console.log('update successful');
          } else if(data.status === 'posterror') {
            console.log('posterror');
          } else {
            console.log('error');
          }
        }
      });
    }
  });

  // Email validation as the user types it in
  $('#email').on('keyup focus', function() {
    if(validateEmail($(this).val()) === false) {
      $(this).css('border-color', '#f98080');
    } else {
      $(this).removeAttr('style')
    }
  });

});
