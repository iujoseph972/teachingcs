<?php

$title = 'TeachingCS';

include_once '/includes/site_functions.php';

require_once('/header.php');

?>
<script type="text/javascript">
$(function() { $('#email').on('keypress', function(e) { if (e.which == 32) return false; }); });
</script>
        <?php if (login_check($mysqli) == false) {?>
          <div id="background"></div>
          <div id="form">
            <div class="whitespace"></div>
            <div id="formbox">
              <h1>Reset your password</h1>
                <input type="text" class="norm" id="email" name="email" placeholder="email@email.com"/>
                <input type="submit" id="forgotsubmit" value="Reset" class="submit" />
                <p class="signup"><a href="/login/">Remembered your password? Go login!</a></p>
            </div>
            <p class="signup"><a href="/join/">Not yet registered? Sign up now!</a></p>
            </div>
<?php      } else {
          header('Location: /');
          exit;
      }

require('/footer.php');
?>
