<?php 

require_once '../classes/Auth.php';
$auth_obj = new Auth();

// print_r($_POST);
// exit;
if (isset($_POST['register'])) {
	unset($_POST['register']);
	$result = $auth_obj->createUser($_POST);
	if ($result) {
		header('location: login.php?register_success');
	} else {
		header('location: register.php?register_error');
	}
}

if (isset($_POST['login'])) {
	unset($_POST['login']);
	$result = $auth_obj->check_login($_POST);
	if ($result) {
		header('location: ../index.php?login_success');
	} else {
		header('location: login.php?error');
	}
}

?>