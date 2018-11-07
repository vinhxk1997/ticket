<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/User.php';

$user = new User();

if ($_POST) {
	$data = $_POST['data'];
	$data['User']['created'] = date('Y-m-d H:i:s');
	$data['User']['modified'] = date('Y-m-d H:i:s');
	
	if ($user->saveLogin($data)) {
		Helper::redirect('movie');
	}
}

?>
<!DOCTYPE html>
<title>User Management</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/f_gnav.php'; ?>

<div class="heading">Customer Register</div>
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
			<dt>
				Fullname
			</dt>
			<dd>
				<?php echo $user->form->input('fullname'); ?>
				<?php echo $user->form->error('fullname'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Address
			</dt>
			<dd>
				<?php echo $user->form->input('address'); ?>
				<?php echo $user->form->error('address'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dd>
				<input type="submit" name="submit" value="Register">
			</dd>
		</dl>
	</section>
</form>

</body>
</html>