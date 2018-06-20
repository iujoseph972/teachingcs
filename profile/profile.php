<?php

  $title = 'TeachingCS - Profile page';

  require_once('../header.php');

  if(isset($_GET['username'])) {
    $user = $_GET['username'];
  } else {
    die("Invalid Username.");
  }

  $userinfo = $mysqli->prepare("SELECT firstname, lastname, city, state, profilepic FROM users WHERE username = ? LIMIT 1");
  $userinfo->bind_param('s', $user);
  $userinfo->execute();    // Execute the prepared query.
  $userinfo->store_result();
  $userinfo->bind_result($firstname, $lastname, $city, $state, $profilepic);
  $userinfo->fetch();

  if ($userinfo->num_rows == 1) {
?>
  <div id="background"></div>
  <div id="profile">
        <?php

          echo '<h1>' . $firstname . ' ' . $lastname;
          if (login_check($mysqli) == true) {
            if($user == htmlentities($_SESSION['username'])) {
              echo '<a href="/editprofile/"><div class="editprofile"></div></a></h1>';
            }
          }
        ?>

      <div id="profilepic">
        <img src="/imgs/userpictures/<?php echo $profilepic; ?>" />
      </div>

</div>
</div>

<?php require_once('../footer.php');

} else {
  header("Location: ../");
}
?>
