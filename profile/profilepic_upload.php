<?php

/*
The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
Author: Munir Safi
*/

require_once('../includes/connect.php');
require_once('../includes/site_functions.php');

teachingcs();

if (login_check($mysqli) == true) {

  if (isset($_POST['image'])) {

    // grab the POST imageData from cropit
    $encoded = $username = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING);
    //explode at ',' - the last part should be the encoded image now
    $exp = explode(',', $encoded);
    //decode the image and finally save it
    $data = base64_decode($exp[1]);
    // create a filename based on the upload time and concatenate to random string
    $newfilename = round(microtime(true)). random_string(50) . '.jpg';
    $file = '../imgs/userpictures/' . $newfilename;
    // write the file to the directory
    file_put_contents($file, $data);
    // update the session's profilepic data with the new profilepic
    $_SESSION['profilepic'] = $newfilename;
    // retrieve the name of the user attempting to change their picture
    $uid = htmlentities($_SESSION['username']);
    // update the database with the new image
    $picture = $mysqli->prepare("UPDATE users SET profilepic = ? WHERE username = ? LIMIT 1");
    $picture->bind_param('ss', $newfilename, $uid);
    $picture->execute();
    $picture->close();
    // let the ajax call know that the submission was successful!
    echo json_encode($newfilename);

  } else {

    // there appears to have been an error with submitting the ajax POST
    $response_array['status'] = 'error';
    echo json_encode($response_array);
  }

} else {

  // the user somehow managed to access this file while they're logged out,
  // but we'll go ahead and redirect them to the homepage
  header('Location: /');

}
?>
