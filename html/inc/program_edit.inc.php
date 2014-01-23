
<?php
$url = Database::buildLateUrl();
foreach ($tabs as $tab) {
	echo '<div class="tab-pane" id="' . $tab['name'] . '">';
	echo '<div class="container">';
	echo '<div class="row">';
	echo '<button type="button" onclick="window.location.reload()" class="btn btn-default margin15" value="cancel">Cancel</button><button type="submit" class="btn btn-primary" name="submit">Save</button>';
	echo '</div>';
	echo '<div class="form-group">';
	$questions = Question::getQuestions($tab['id']);
	foreach ($questions as $question) {
		$answer = Answer::getAnswer($program->id, $year->id, $question['id']);
		switch ($question['type']) {
			case (1):
				?>
				<label class="col-sm-3 control-label"><?php echo $question['question']; ?></label>
				<div class="col-sm-9 marginbottom20">
				<input type="text" name="<?php echo $question['id']; ?>" class="form-control" value="<?php echo $answer->answer; ?>">
				</div>
				<?php
				break;
			case (2):
				?>
				<label><?php echo $question['question']; ?></label>
				<div class="col-sm-11"><textarea class="form-control marginbottom20" id="copylast-<?php echo $question['id']; ?>" name="<?php echo $question['id']; ?>"><?php echo $answer->answer; ?></textarea></div>
				<div class="col-sm-1"><button type="button" name="<?php echo $question['id']; ?>" onclick="copyLast('<?php echo $question['id']; ?>')" class="btn">Copy</button></div>
				<?php
				break;
			case (3):
				?>
				<div class="clearfix marginbottom20">
				<label class="col-sm-6 control-label"><?php echo $question['question']; ?></label>
				<div class="input-group col-sm-6">
			    	<input type="date" class="form-control" name="<?php echo $question['id']; ?>" value="<?php echo $answer->answer; ?>">
			      	<div class="input-group-btn">
				        <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">Copy <span class="caret"></span></button>
				        <ul class="dropdown-menu pull-right">
				          <li><a href="#">Copy from last year</a></li>
				        </ul>
			      </div><!-- /btn-group -->
			    </div><!-- /input-group -->
			    </div>
			    <?php
				break;
		}
	}
	echo '</div>';
	echo '<div class="row">';
	echo '<button type="button" onclick="window.location.reload()" class="btn btn-default margin15" value="cancel">Cancel</button><button type="submit" class="btn btn-primary" name="submit">Save</button>';
	echo '</div>';
	echo '</div>';
	echo '</div>';
}
?>