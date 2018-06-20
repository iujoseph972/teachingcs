<?php

  include_once 'connect.php';
  include_once 'site_functions.php';

  teachingcs();

  if (isset($_POST['email'], $_POST['p'])) {
      $email = $_POST['email'];
      $password = $_POST['p'];

      if (login($email, $password, $mysqli)) {
          $response_array['status'] = 'success';
          echo json_encode($response_array);
      } else {
          $response_array['status'] = 'error';
          echo json_encode($response_array);
      }
  } else {
    $response_array['status'] = 'other';
    echo json_encode($response_array);
  }
?>
