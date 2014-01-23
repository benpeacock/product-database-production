<?php
require '../config.php';
if (isset($session->user_id)) {
	header('Location: /controllers/Dashboard.php');
} else {
	header('Location: /controllers/Login.php');
}
