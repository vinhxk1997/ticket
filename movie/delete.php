<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/base/Helper.php';
require_once '../lib/model/Movie.php';
require_once '../lib/model/User.php';

$user = new User();

if ($user->isLoggedIn()) {
	if ($user->isAdmin()) {		
	} else {
		header('Location: ../user/login.php');
		$user->logout();
	}
}else
{
	Helper::redirect('user/login.php');
}

$movie = new Movie();

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('movie');
}

$movie->deleteById($id);

Helper::redirect('movie');

?>