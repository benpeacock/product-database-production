<?php
foreach ($tabs as $tab) {
	echo '<div class="tab-pane" id="' . $tab['name'] . '">';
	echo '<div class="container">';
	echo '<div class="down40">';
	$questions = Question::getQuestions($tab['id']);
	foreach ($questions as $question) {
		$answer = Answer::getAnswer($program->id, $year->id, $question['id']);
		switch ($question['type']) {
			case (1):
				echo '<div class="row marginbottom20">';
				echo '<label class="col-sm-3 control-label">' . $question['question'] . '</label>';
				echo '<div class="col-sm-9">';
				echo nl2br($answer->answer);
				echo '</div>';
				echo '</div>';
				break;
			case (2):
				echo '<label>' . $question['question'] . '</label>';
				echo '<div class="marginbottom20 
col-sm-12">' . nl2br($answer->answer) . '</div>';
				break;
			case (3):
				echo '<div class="row marginbottom20">';
				echo '<label class="col-sm-3 control-label">' . $question['question'] . '</label>';
				echo '<div class="col-sm-9">';
				echo nl2br($answer->answer);
				echo '</div>';
				echo '</div>';
				break;
		}
	}
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
?>
