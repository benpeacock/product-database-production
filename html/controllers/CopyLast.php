<?php

require_once '../../config.php';

$question = $_GET['question'];
$program = $_GET['id'];
// -1 decrements value of year to retrieve value from previous year.
$year = $_GET['year'] - 1;

$result = Answer::getAnswer($program, $year, $question);

echo $result->answer;
