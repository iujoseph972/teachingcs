
<?php

include_once 'connect.php';
include_once 'site_functions.php';

function get_result($standard, $grade, $framework, $mysqli) {
  $stmt = $mysqli->prepare("SELECT name FROM resources WHERE standard=? AND gradelevel=? AND concept=?");
  $stmt->bind_param('sss', $standard, $grade, $framework);  // Bind "$email" to parameter.
  $stmt->execute();    // Execute the prepared query.
  $stmt->store_result();
  $stmt->bind_result($name);

  if ($stmt->num_rows > 0) {
?>
    <div class="whitespace">
    <table border="true">
      <tr><td>Name</td><td>Standard</td><td>Grade</td><td>Framework</td></tr>
<?php
    while ($stmt->fetch()) {
      echo "<tr><td>" . $name . "</td><td>" . $standard . "</td><td>" . $grade . "</td><td>" . $framework . "</td></tr>";
    }

?>
    </table>
    </div>
<?php
  }
}
?>
