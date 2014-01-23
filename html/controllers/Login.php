<?php
require_once '../../config.php';
if (isset($_POST['submit'])) {
	$username = trim($_POST['username']);
	$hash_me = trim($_POST['password']);
	$password = sha1($hash_me);
	$user = new User();
	$found_user = $user->authenticate($username, $password);
	if ($found_user) {
		$session->login($found_user);
		header('Location: Dashboard.php');
	}
}
include '../inc/header.inc.php';
if (isset($_POST['submit']) && !isset($session->user_id)) {
	echo '<div class="alert alert-danger">Username or password incorrect.  Try Again.</div>';
}
include '../views/login.php';
include '../inc/footer.inc.php';
