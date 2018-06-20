<?php

/*
The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
Author: Munir Safi
*/

include_once 'connect.php';
include_once 'site_functions.php';

teachingcs();

// check if user is logged in
if (login_check($mysqli) == false) {
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
      if ($stmt = $mysqli->prepare("SELECT email FROM users WHERE email = ? LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($email);
        $stmt->fetch();
        if ($stmt->num_rows == 1) {
          $token = uniqid(random_string(20), true);
          $date = date('Y-m-d H:i:s');
          // insert request into the database and generate a token
          // a user may have multipe requests with multiple tokens,
          // but as soon as one token is created, all other tokens
          // will be deleted
          if ($insert_stmt = $mysqli->prepare("INSERT INTO pass_reset (email, token, resetdate) VALUES (?, ?, ?)")) {
              $insert_stmt->bind_param('sss', $email, $token, $date);
              // success! password reset token generated, and email has been submitted
              $response_array['status'] = 'success';
              echo json_encode($response_array);

              mail($email, "TeachingCS Password Reset Notifcation", "Hey there! \n \nIt appears you're attempting to reset your password. Here is your token: \n\n" . $token);
              if (! $insert_stmt->execute()) {
                // return an error status
                $response_array['status'] = 'error';
                echo json_encode($response_array);
              }
          }
        }
      }
    }
} else {
  // return an error status because the user is trying to submit
  // the form while they're logged in, which shouldn't even be possible!
  $response_array['status'] = 'error';
  echo json_encode($response_array);
}
?>
