<?php

  /*
  The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
  Author: Munir Safi
  */

  $title = 'TeachingCS - Edit Your Profile';
  require_once('../header.php');

  if (login_check($mysqli) == true) {

    $user = htmlentities($_SESSION['username']);

    $userinfo = $mysqli->prepare("SELECT email, firstname, lastname, city, state, gender, phone, profilepic, bio FROM users WHERE username = ? LIMIT 1");
    $userinfo->bind_param('s', $user);
    $userinfo->execute();    // Execute the prepared query.
    $userinfo->store_result();
    $userinfo->bind_result($email, $firstname, $lastname, $city, $state, $gender, $phone, $profilepic, $bio);
    $userinfo->fetch();

    if ($userinfo->num_rows == 1) {
    ?>
    <div id="background"></div>
    <div id="profile">
      <div class="wrapper">
        <div class="whitespace"></div>
        <?php

          echo '<h1>' . $firstname . ' ' . $lastname . '</h1>';
        ?>
        <div id="profilepic" class="edittype">
          <a href="#picture-editor" name="modal-u"><div class="editimage">
            <img src="/imgs/userpictures/<?php echo $profilepic; ?>" />
            <span>Click here to update your profile picture</span>
          </div></a>
        </div>
        <div id="containerbox">
          <div id="profilenav">
            <ul>
              <li class="active"><a href="#general">General Settings</a></li>
              <li><a href="#myresources">My Resources</a></li>
              <li><a href="#passreset">Password Reset</a></li>
            </ul>
          </div>
          <label class="labelleft">First Name:</label>
          <label class="labelright">Last Name:</label>
          <input type="text" class="norm left firstname" value="<?php echo $firstname; ?>" placeholder="First Name"/>
          <input type="text" class="norm right lastname" value="<?php echo $lastname; ?>" placeholder="Last Name"/>
          <label class="label">Email:</label>
          <input type="text" class="norm email" value="<?php echo $email; ?>" placeholder="Email"/>
          <label class="label">Phone Number:</label>
          <input type="text" class="norm phone" value="<?php echo $phone; ?>" placeholder="Phone Number"/>
          <label class="label">Short bio:</label>
          <textarea type="text" class="norm textarea bio" value="<?php echo $bio; ?>" placeholder="Write a short bio!"></textarea>
          <input type="submit" id="updateprofile" class="updateprofile" value="Update"></input>
        </div>
      </div>
    </div>
    <div id="picture-editor" data-type="modal-u">
      <h1>Update Your Picture</h1>
      <div class="closebutton close">&times;</div>
      <div class="image-editor">
        <div class="cropit-preview"></div>
        <div class="controls">
          <div class="rotate-ccw"></div>
          <div class="rotate-cw"></div>
        </div>

        <input type="range" class="cropit-image-zoom-input">

        <input type="file" class="cropit-image-input">
        <button class="export close">Update</button>
      </div>
    </div>

    <script type="text/javascript" src="/js/plugins/jquery.cropit.js"></script>
    <script>
    $('.image-editor').cropit({
      imageBackground: true,
      imageBackgroundBorderWidth: 0.1,
      imageState: {
        src: 'http://localhost/imgs/userpictures/<?php echo $profilepic; ?>',
      },
    });
    </script>
    <script type="text/javascript" src="/js/profile.js"></script>
    <script type="text/javascript" src="/js/plugins/modal-u.js"></script>
    <?php require_once('../footer.php');

    } else {
      header("Location: ../");
    }
  } else {
    header('Location: ../');
  }
?>
