<?php

$title = "TeachingCS - Contact Us";
require("header.php");

?>

<div id="background"></div>
<div id="largeform">
  <form action="/contact/" method="post">
    <h1>Contact Us</h1>
    <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    <label for="name">Name</label>
    <input type="text" name="name" class="norm">
    <label for="email">Email</label>
    <input type="text" name="email" class="norm" id="email">
    <label for="message">Message</label>
    <textarea name="message" class="norm"></textarea>
    <input type="submit" name="submit" class="submit filled" value="SEND">
  </form>
</div>

<?php

require("footer.php");

 ?>
