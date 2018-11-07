<?php
require_once 'lib/config/const.php';
require_once 'lib/config/database.php';
require_once 'lib/model/User.php';

$user = new User();

if ($user->isLoggedIn()) {
	if ($user->isAdmin()) {
		header('Location: ./movie/');
	} else {
		header('Location: ../movie/list.php');
	}
}else
{
	Helper::redirect('movie/list.php');
}