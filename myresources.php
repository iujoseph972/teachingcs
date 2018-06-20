<?php

$title = 'TeachingCS - Upload a Resource';
require_once('header.php');

?>
<div id="background">
<div class="whitespace">
<?php

if (login_check($mysqli)) {

  $stmt = $mysqli->prepare("SELECT uniqid FROM resources_uploader WHERE username=?");
  $stmt->bind_param('s', $_SESSION["username"]);  // Bind "$email" to parameter.
  $stmt->execute();    // Execute the prepared query.
  $stmt->store_result();
  $stmt->bind_result($uniqid);

  ?>

      <table border="true">
        <tr><td>Name</td><td>Grade</td><td>Standard</td><td>Concept</td><td>Subject</td></tr>
  <?php
  while ($stmt->fetch()) {

    if ($stmt->num_rows > 0) {
      $resources = $mysqli->prepare("SELECT name, gradelevel, standard, concept, subject, state, language, method FROM resources WHERE uniqid=?");
      $resources->bind_param('s', $uniqid);  // Bind "$email" to parameter.
      $resources->execute();    // Execute the prepared query.
      $resources->store_result();
      $resources->bind_result($name, $gradelevel, $standard, $concept, $subject, $state, $language, $method);

      while ($resources->fetch()) {
        $name_better = 
        echo "<tr><td>" . $name . "</td><td>" . $gradelevel . "</td><td>" . $standard . "</td><td>" . $concept . "</td></tr>";
      }

    }
    else {
      echo "Please Add some resources.";
    }

  }
  ?>
      </table>
      </div>
      </div>
  <?php
}


require('footer.php');

?>
