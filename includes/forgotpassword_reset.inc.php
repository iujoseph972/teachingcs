<?php

/*
The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
Author: Munir Safi
*/

include_once('connect.php');
include_once('site_functions.php');

teachingcs();

if(login_check($mysqli) == false) {
    if (isset($_POST['token'], $_POST['p'])) {

      $token = $_POST['token'];
      $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
      if (strlen($password) != 128) {
        $response_array['status'] = 'error';
        echo json_encode($response_array);
      }
      if ($stmt = $mysqli->prepare("SELECT email, resetdate
        FROM pass_reset
        WHERE token = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $token);
        $stmt->execute();
        $stmt->store_result();

        // get variables from result.
        $stmt->bind_result($email, $resetdate);

        if ($stmt->num_rows >= 1) {

          $hashpassword = password_hash($password, PASSWORD_DEFAULT);

          while($stmt->fetch()) {
            if ($insert_stmt = $mysqli->prepare("UPDATE users SET password = ? WHERE email = ? LIMIT 1")) {
                $insert_stmt->bind_param('ss', $hashpassword, $email);
                $insert_stmt->execute();
                if (! $insert_stmt->execute()) {
                  // return an error status because we failed to insert a new password
                  $response_array['status'] = 'error';
                  echo json_encode($response_array);
                }

                $delete_stmt = $mysqli->prepare("DELETE FROM pass_reset WHERE email = ?");
                $delete_stmt->bind_param('s', $email);
                $delete_stmt->execute();
                if (! $delete_stmt->execute()) {
                  // return an error status because we failed to delete duplicates
                  $response_array['status'] = 'error';
                  echo json_encode($response_array);
                }
            }
          }
          // return a success status
          $response_array['status'] = 'success';
          echo json_encode($response_array);
        } else {
          // return a success status
          $response_array['status'] = 'invalidtoken';
          echo json_encode($response_array);
        }
      }
    } else {
      // return an error status because of incorrect post variables
      $response_array['status'] = 'error';
      echo json_encode($response_array);
    }
} else {
    header("Location: /");
}
?>
