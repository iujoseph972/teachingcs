<?php

/*
The contents of this should only be used for TeachingCS. Please do not duplicate any of this code without the author(s) permission.
Author: Munir Safi
*/

// teachingCS session creation
function teachingcs() {
  session_start();
  session_regenerate_id(true);
}

// Handle user login functions
function login($email, $password, $mysqli) {
  // Using prepared statements means that SQL injection is not possible.
  if ($stmt = $mysqli->prepare("SELECT id, username, profilepic, password, firstname, lastname, rights FROM users WHERE email = ? LIMIT 1")) {
    $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
    $stmt->execute();    // Execute the prepared query.
    $stmt->store_result();

    // get variables from result.
    $stmt->bind_result($user_id, $username, $profilepic, $db_password, $firstname, $lastname, $rights);
    $stmt->fetch();

    if ($stmt->num_rows == 1) {
      // If the user exists we check if the account is locked
      // from too many login attempts
      if (checkbrute($user_id, $mysqli) == true) {
        // Account is locked
        // Send an email to user saying their account is locked
        return false;
      } else {
        // Check if the password in the database matches
        if (password_verify($password, $db_password)) {
          // Password is correct!
          // Get the user-agent string of the user.
          // $user_browser = $_SERVER['HTTP_USER_AGENT'];
          // XSS protection as we might print this value
          $user_id = preg_replace("/[^0-9]+/", "", $user_id);
          // XSS protection as we might print this value
          $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username);
          $firstname = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $firstname);
          $lastname = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $lastname);
          // Store session data
          $_SESSION['user_id'] = $user_id;
          $_SESSION['username'] = $username;
          $_SESSION['profilepic'] = $profilepic;
          $_SESSION['rights'] = $rights;
          $_SESSION['firstname'] = $firstname;
          $_SESSION['lastname'] = $lastname;
          $ipaddress = $_SERVER['REMOTE_ADDR'];
          // remove lastname and change to user ip
          $_SESSION['login_string'] = hash('sha256', $user_id . $ipaddress);

          // Login successful.
          return true;
        } else {
          // Password is not correct, record attempt
          $now = time();
          $mysqli->query("INSERT INTO login_attempts(uid, time) VALUES ('$user_id', '$now')");
          return false;
        }
      }
    } else {
      // No user exists.
      return false;
    }
  }
}

// This function is to check if any user/bot is attempting to brute force their
// way into a user account. If so, we'll block them from logging in to protect them.
function checkbrute($user_id, $mysqli) {
  // Get timestamp of current time
  $now = time();

  // All login attempts are counted from the past 2 hours.
  $valid_attempts = $now - (2 * 60 * 60);

  if ($query = $mysqli->prepare("SELECT time FROM login_attempts WHERE uid = ? AND time > '$valid_attempts'")) {
    $query->bind_param('i', $user_id);

    // Execute the prepared query.
    $query->execute();
    $query->store_result();

    // If there have been more than 10 failed logins
    if ($query->num_rows > 10) {
      return true;
    } else {
      return false;
    }
  }
}

// Verify a user's status of whether or not they're logged into their account
function login_check($mysqli) {
  // Check if all session variables are set
  if (isset($_SESSION['user_id'], $_SESSION['profilepic'], $_SESSION['username'], $_SESSION['firstname'], $_SESSION['lastname'], $_SESSION['login_string'])) {

    $user_id = $_SESSION['user_id'];
    $profilepic = $_SESSION['profilepic'];
    $firstname = $_SESSION['firstname'];
    $lastname = $_SESSION['lastname'];
    $username = $_SESSION['username'];
    $login_string = $_SESSION['login_string'];
    $ipaddress = $_SERVER['REMOTE_ADDR'];

    $login_check = hash('sha256', $user_id . $ipaddress);

    if ($login_check == $login_string) {
      // Logged In!!!!
      return true;
    } else {
      // Not logged in
      return false;
    }

  } else {
    // Not logged in
    return false;
  }
}

// Generate a random string (that's it, nothing special)
function random_string($length) {
    $key = '';
    $keys = array_merge(range(0, 9), range('a', 'z'));
    for ($i = 0; $i < $length; $i++) {
        $key .= $keys[array_rand($keys)];
    }
    return $key;
}

// cleaning urls
function esc_url($url) {

    if ('' == $url) {
        return $url;
    }

    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;

    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }

    $url = str_replace(';//', '://', $url);

    $url = htmlentities($url);

    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);

    if ($url[0] !== '/') {
        // We're only interested in relative links from $_SERVER['PHP_SELF']
        return '';
    } else {
        return $url;
    }
}

?>
