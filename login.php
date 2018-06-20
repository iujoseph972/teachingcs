<?php
  $title = 'TeachingCS - Login';
  require_once('header.php');
?>
<?php if (login_check($mysqli) == false) { ?>
  <div id="form">
    <div id="background"></div>
    <div class="whitespace"></div>
    <div id="formbox">
      <h1>Login</h1>
      <input type="text" class="norm" name="email" id="email" placeholder="email@email.com"/>
      <input type="password" class="norm" name="password" id="password" placeholder="password"/>
      <input type="submit" class="submit" value="Login" id="loginsubmit" />
    </div>
    <a href="/forgotpassword/" class="extra">Forgot your password?</a>
  </div>
<?php
  require('footer.php');
} else {
  header('Location: /');
  exit;
}
?>
