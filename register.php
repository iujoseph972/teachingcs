<?php
  $title = 'TeachingCS - Register';
  require_once('header.php');
?>
<script type="text/javascript">
  $(function() { $('#firstname').on('keypress', function(e) { if (e.which == 32) return false; }); });
  $(function() { $('#lastname').on('keypress', function(e) { if (e.which == 32) return false; }); });
  $(function() { $('#username').on('keypress', function(e) { if (e.which == 32) return false; }); });
  $(function() { $('#email').on('keypress', function(e) { if (e.which == 32) return false; }); });
</script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php if (login_check($mysqli) == false) { ?>
    <div id="form">
      <div id="background"></div>
      <div class="whitespace"></div>
      <div id="formbox">
        <h1>Register</h1>
        <input type="text" class="norm left" name="firstname" id="firstname" placeholder="First Name" autocomplete="off"/>
        <input type="text" class="norm right" name="lastname" id="lastname" placeholder="Last Name" autocomplete="off"/>
        <input type="text" class="norm" name="username" id="username" placeholder="Your Username" autocomplete="off"/>
        <input type="text" class="norm" name="email" id="email" placeholder="email@email.com" autocomplete="off"/>
        <input type="password" class="norm" name="password" id="password" placeholder="Password" autocomplete="off"/>
        <input type="password" class="norm" name="confirmpwd" id="confirmpwd" placeholder="Confirm Password" autocomplete="off"/>
        <div class="g-recaptcha" data-sitekey="6LfDNBQUAAAAAATIw-XSU12oSu-b4iVyS5uC2PRw"></div>
        <input type="submit" class="submit" value="Register" id="registersubmit" />
      </div>
    </div>
<?php
} else {
  header('Location: /');
  exit;
}
require('footer.php');
?>
