<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
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

$data = $user->findAll();
?>
<!DOCTYPE html>
<title>User Management</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/gnav.php'; ?>

<div class="heading">User Management</div>
<div class="box_table">
	<table>
		<colgroup>
			<col width="25%">
			<col width="20%">
			<col width="20%">
			<col width="35%">
		</colgroup>
		<thead>
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Full name</th>
				<th>Address</th>
			</tr>
		</thead>
		<tbody>
			<?php if (!empty($data)) : ?>
				<?php foreach ($data as $item) : $item = $item['User']; ?>
					<tr>
						<td class="center">
							<?php echo date('Y/m/d H:i:s', strtotime($item['created'])); ?>
						</td>
						<td>
							<?php echo $item['email']; ?>
						</td>
						<td>
							<?php echo $item['fullname']; ?>
						</td>
						<td>
							<?php echo $item['address']; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</div>

</body>
</html>