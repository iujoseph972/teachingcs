<?php

  require_once('/includes/connect.php');
  require_once('/includes/site_functions.php');

  teachingcs();

  if (login_check($mysqli) == true && $_SESSION['rights'] == 1) {

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />

	<title>
    <?php

      $title = 'TeachingCS - Administration Dashboard';
      echo $title;

    ?>
  </title>

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

  

</body>

<?php } ?>
