<?php

  require_once('/includes/connect.php');
  require_once('/includes/site_functions.php');

  teachingcs();

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />

	<title><?php echo $title; ?></title>

	<script type="text/javascript" src="/js/plugins/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/js/plugins/sidr.min.js"></script>
  <script type="text/javascript" src="/js/plugins/unslider.js"></script>
  <script type="text/javascript" src="/js/sha512.js"></script>
	<script type="text/javascript" src="/js/main.js"></script>
	<script type="text/javascript" src="/js/form.js"></script>

	<link rel="stylesheet" href="/css/main.min.css">
	<link rel="stylesheet" href="/css/sidr.css">

</head>

<body>
  <div id="mobileform">
    <div id="close"></div>
    <ul>
      <li></li>
    </ul>
  </div>
	<div id="main">
		<div id="topbar">
			<div class="wrapper">
        <a href="/"><div id="logo"></div></a>
				<div id="navbar">
					<div id="mobilemenu" href="#mobile">
						<span></span>
						<span></span>
						<span></span>
					</div>
					<ul>
            <?php if (login_check($mysqli) == true) {
              echo '
              <li id="upload"><a href="/uploadresource/">Upload a Resource</a></li>
              <li id="myprofile">
                <a class="profiledrop"' . htmlentities($_SESSION['username']) . '/">
                  <div id="smallprofilepic"><img src="/imgs/userpictures/' . $_SESSION['profilepic'] . '" /></div>
                  <span>' . htmlentities(ucfirst($_SESSION['firstname'])) . ' ' . htmlentities(ucfirst($_SESSION['lastname'])) . '</span>
                </a>
                <div class="dropdown profile">
                    <a href="/editprofile/">Edit My Profile</a>
                    <a href="#resources">My Resources</a>';
                    if(htmlentities($_SESSION['rights']) == 1) {
                      echo '<a href="/admindashboard/">Admin Dashboard</a>';
                    }
              echo '<a href="/logout/">Logout</a>
                </div>
              </li>';
            } else { ?>
            <li><a href="/join/" class="register">Register</a></li>
						<li><a href="/login/"><span>Login</span></a></li>
            <?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
