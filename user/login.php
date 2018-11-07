<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

$user = new User();

if ($_POST) {
	$data = $_POST['data'];
	
	if ($user->login($data)) {
		if ($user->isAdmin()) {
			header('Location: ./');
		} else {
			header('Location:../movie/list.php');
		}
	} else {
		$login = false;
	}
}

?>
<!DOCTYPE html>
<title>User Login</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/f_gnav.php'; ?>

<div class="heading">User Login</div>
	<?php if (isset($login) && !$login) : ?>
		<p class="err">Login failed! Please check your email and password!</p>
	<?php endif; ?>
	<form action="" class="form" method="post">
		<section>
			<dl>
				<dt>
					Email
				</dt>
				<dd>
					<?php echo $user->form->input('email'); ?>
					<?php echo $user->form->error('email'); ?>
				</dd>
			</dl>
		</section>
		<section>
			<dl>
				<dt>
					Password
				</dt>
				<dd>
					<?php echo $user->form->input('password'); ?>
					<?php echo $user->form->error('password'); ?>
				</dd>
			</dl>
		</section>
		<section>
			<dl>
				<dd>
					<input type="submit" name="submit" value="Login"><br><br>
					<a href="../customer/register.php">Register</a>
				</dd>
			</dl>
		</section>
	</form>
</div>

</body>
</html>