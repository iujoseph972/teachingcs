<?php

/*
The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
Author: Munir Safi
*/

include_once 'connect.php';
include_once 'site_functions.php';

$error_msg = ""; // initating error message in case there are errors

if (isset($_POST['username'], $_POST['email'], $_POST['p'])) {
    // Sanitize
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $confirmpassword = filter_input(INPUT_POST, 'confirmp', FILTER_SANITIZE_STRING);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);


    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $error_msg = 'error';
    }

    if($password != $confirmpassword) {
      $error_msg = 'passmismatch';
    }

    // if (strlen($password) != 128) {
    //   //if this error occurs, there is a problem with the back-end, and not the
    //   //user's request
    //   $error_msg = 'error';
    // }

    $prep_stmt = "SELECT id FROM users WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

   // check existing email
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows == 1) {
          // if theres a result of 1, then clearly the email is already taken
          $error_msg = 'emailtaken';
          $stmt->close();
        }
    } else {
      // if there's an issue with running the SQL query, we need to say there's
      // an error
      $error_msg = 'error';
      $stmt->close();
    }

    // check existing username
    $prep_stmt = "SELECT id FROM users WHERE username = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);

    if ($stmt) {
        $stmt->bind_param('s', $username);
        $stmt->execute();
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
          // if there's a result of 1, then the username is already in use
          $error_msg = 'usernametaken';
          $stmt->close();
        }
    } else {
        $error_msg = 'error';
        $stmt->close();
    }

    if (empty($error_msg)) {
        // take record of the date

        // Create salted password
        $password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the new user into the database
        if ($insert_stmt = $mysqli->prepare("INSERT INTO users (username, email, password, firstname, lastname) VALUES (?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssss', $username, $email, $password, $firstname, $lastname);

            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        $response_array['status'] = 'success';
        echo json_encode($response_array);
        mail($email, "Welcome to TeachingCS", "Hello " . $firstname . "! \n \nThank you for signing up to join TeachingCS. By signing up, you will now be able to upload your own
        resources to share with the rest of our community. If you have any questions at all regarding the material on the site, please do not hesitate to contact us with your query. \n\n Happy sharing!");

    } else {
      $response_array['status'] = $error_msg;
      echo json_encode($response_array);
    }
}
?>
