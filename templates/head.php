<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

if (!isset($user)) {
	$user = new User();
}
?>

<header>
	<div class="logo">
		<img src="../images/film.png" width="45" />
		<div class="title">Platinum Cineplex</div>
	</div>
	<nav>
		<ul>
			<?php if ($user->isLoggedIn()) : ?>
				<li><a href="<?php echo BASE_URL; ?>user/logout.php"><img src="../images/logout.png" width="25">Logout</a></li>
			<?php else : ?>
				<li><a href="<?php echo BASE_URL; ?>user/login.php"><img src="../images/logout.png" width="25">Login</a></li>
			<?php endif; ?>
		</ul>
	</nav>
</header>