<?php
	$title = 'TeachingCS - A Collective of Educational Materials for Computer Science Educators';
	require('header.php');
	include_once('./includes/results.inc.php');
	$standard = mysqli_escape_string($mysqli, $_GET['standard']);
	$grade = mysqli_escape_string($mysqli, $_GET['grade']);
	$concept = mysqli_escape_string($mysqli, $_GET['concept']);
?>

<div id="resultsbackground">
  <div class="wrapper">
    <div id="searchresult">Showing results for: <?php echo ucfirst($standard) . ', ' . ucfirst($grade) . ', ' . ucfirst($concept); ?></div>
  </div>
</div>

<div class="wrapper">
  <div id="filters">
  </div>
  <div id="results">
		<?php get_result($standard, $grade, $concept, $mysqli); ?>
  </div>
</div>

<?php
	require('footer.php');
?>
