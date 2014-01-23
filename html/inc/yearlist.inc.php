<div class="container">
	<div class="row">
		<ul style="list-style-type:none">
		<?php
		$years = Year::getYearList();
		foreach ($years as $year) {
			echo '<div class="col-md-1"><a href="';
			if (isset($_GET['id'])) { echo '?id=' . $_GET['id']; }
			echo '&year=' . $year['id'] . '">' . $year['year'] . '</a></div>';
		}
		?>
		</ul>
	</div>
</div>