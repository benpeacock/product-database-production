<div class="container">
<?php
// See if program is set in URL
if (isset($_GET['id'])) {
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if (filter_var($id, FILTER_VALIDATE_INT) == false) { exit('Invalid program id.'); }
	$program = Program::getProgramObject($id);
	echo '<h3>Editing: ' . $program->name;
	// See if year is set in URL
	if (isset($_GET['year'])) {
		// if year is set, display it
		$yr = filter_input(INPUT_GET, 'year', FILTER_SANITIZE_NUMBER_INT);
		if (filter_var($yr, FILTER_VALIDATE_INT) == false) { exit('Invalid program year.'); }
		$year = Year::getyearObject($yr);
		echo ', ' . $year->year . '</h3><a href="?id=' . $program->id . '">Select a different year</a>';
	} else {
	echo '</h3>';
	// if year isn't set, display the year list to select from
	$years = Year::getYearList();
	echo '<h5>Select a year:</h5>';
	echo '<ul style="list-style-type:none">';
	foreach ($years as $year) {
		echo '<div class="col-md-1"><a href="';
			// Build URL containing selected program id
			if (isset($program->id)) { echo '?id=' . $program->id; }
		echo '&year=' . $year['id'] . '">' . $year['year'] . '</a></div>';
	}
	echo '</ul>';
	}
} else {
	// If no program or year is set in URL, instruct user to select.
	echo '<h3>Select a program to edit.</h3>';
}
?>
</div>
