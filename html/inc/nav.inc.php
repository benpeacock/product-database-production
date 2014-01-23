<nav class="navbar navbar-default" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/"><img src="../img/30.png" /></a>
  </div>
  
  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
    <ul class="nav navbar-nav">
    <?php
    isset($session->user_id);
    if (isset($session->user_id)) { 
		Menu::makeMenu(); 
	}
	?>
	</ul>
    <ul class="nav navbar-nav navbar-right">
    <?php 
    if (isset($_GET['id']) && isset($_GET['year']) && !isset($_GET['action'])) {
    	echo '<li><a href="';
    	Database::buildUrl();
  		echo '&action=edit">Edit</a></li>';
    } elseif (isset($_GET['action']) && $_GET['action'] == 'edit') {
		echo '<li><a href="';
		echo $_SERVER['PHP_SELF'];
    	echo '?id=' . $_GET['id'];
    	echo '&year=' . $_GET['year'];
    	echo '">Display</a></li>';
    }
    ?>
      <li><a href="mailto:bpeacock@academic-travel.com">Help</a></li>
      <?php 
      if (isset($session->user_id)) {
		echo '<li><a href="../controllers/Logout.php">Log Out</a></li>';
		} else {
		echo '<li><a href="../controllers/Login.php">Login</a></li>';
		}
      ?>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>
