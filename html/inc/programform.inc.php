<div class="container down40">
	<form class="form-inline" action="<?php Database::buildUrl(); ?>" method="post">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs"> 
		<?php
		$tabs = Tab::getTabs();
		foreach ($tabs as $tab) {
			echo '<li>';
				echo '<a href="#' . $tab['name'] . '" data-toggle="tab">' . ucfirst($tab['name']) . '</a>';
			echo '</li>';
		}
		?>
		</ul>
		<div class="tab-content">
		<?php
		if (isset($_GET['action']) && $_GET['action'] == 'edit') {
			include 'program_edit.inc.php';
		} else {
			include 'program_display.inc.php';
		}
		?>
		</div>
	</form>
</div>
