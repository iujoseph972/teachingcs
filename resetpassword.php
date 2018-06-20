<?php

  $title = 'TeachingCS - Reset Password';

  include_once('/includes/connect.php');
  include_once('/includes/site_functions.php');

  require_once('/header.php');

  if (login_check($mysqli) == false) {?>
  <div id="wrapper2">
    <div id="form">
      <div id="background"></div>
      <div class="whitespace"></div>
      <div id="formbox">
        <h1>Enter the Reset Token You Received In Your Email</h1>
        <input type="text" class="norm" name="token" id="token" placeholder="Token"/>
        <input type="password" class="norm" id="password" name="password" placeholder="New Password"/>
        <input type="password" class="norm" id="confirmpwd" name="confirmpwd" placeholder="Confirm Password"/>
        <input type="submit" id="resetsubmit" value="Confirm Reset" class="submit"/>
        <p class="signup"><a href="/login/">Remembered your password? Go login!</a></p>
      </div>
      <p class="signup"><a href="/join/">Not yet registered? Sign up now!</a></p>
    </div>
  </div>
  <?php
    } else {
      header('Location: /');
      exit;
    }

    require('/footer.php');
  ?>
