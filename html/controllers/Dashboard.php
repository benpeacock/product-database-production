<?php
require_once '../../config.php';

if(isset($_POST['submit'])) {
	$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
	if (filter_var($id, FILTER_VALIDATE_INT) == false) { exit('Invalid program id'); }
	$year = filter_input(INPUT_GET, 'year', FILTER_SANITIZE_NUMBER_INT);
	if (filter_var($year, FILTER_VALIDATE_INT) == false) { exit('Invalid program year'); }
	
	foreach ($_POST as $key=>$value) {
		$save = Answer::saveAnswer($id, $year, $key, $value);
	}
}

include '../inc/header.inc.php';
include '../views/dashboard.php';
if (isset($program->id) && isset($year->year)) {
	include '../inc/programform.inc.php';
}
include '../inc/footer.inc.php';



