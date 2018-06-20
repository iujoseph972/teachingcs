<?php

  /*
  The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
  Author: Munir Safi
  */

  include_once 'connect.php';
  include_once 'site_functions.php';

  teachingcs();

  // check if user is logged in
  if (login_check($mysqli) == true) {

    if (isset($_POST['email'], $_POST['firstname'], $_POST['lastname'], $_POST['phone'], $_POST['bio'])) {

      $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
      $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
      $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING);
      $bio = filter_input(INPUT_POST, 'bio', FILTER_SANITIZE_STRING);
      $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
      $email2 = filter_var($email, FILTER_VALIDATE_EMAIL);

      $user = htmlentities($_SESSION['username']);

      if ($insert_stmt = $mysqli->prepare("UPDATE users SET email = ?, firstname = ?, lastname = ?, phone = ?, bio = ? WHERE username = ?")) {
          $insert_stmt->bind_param('ssssss', $email2, $firstname, $lastname, $phone, $bio, $user);
          $insert_stmt->execute();
          // success! password reset token generated, and email has been submitted
          $response_array['status'] = 'success';
          echo json_encode($response_array);

          if (!$insert_stmt->execute()) {
              header('Location: ../error.php?err=Registration failure: INSERT');
          }
      }
    } else {
      header('Location: ../error.php?err=Registration failure: POST');
      $response_array['status'] = 'posterror';
      echo json_encode($response_array);
    }
} else {
  // return an error status because the user is trying to submit
  // the form while they're logged out, which shouldn't even be possible!
  header('Location: /');
  $response_array['status'] = 'error';
  echo json_encode($response_array);
}
?>
