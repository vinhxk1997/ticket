<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/model/MovieCategory.php';
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

$id = isset($_GET['id']) ? intval($_GET['id']) : null;

if (empty($id)) {
	Helper::redirect('movie_category');
}

$movieCategory = new MovieCategory();
$movieCategory->findById($id);
$success = false;

if ($_POST) {
	$data = $_POST['data'];
	$data['MovieCategory']['created'] = date('Y-m-d H:i:s');
	$data['MovieCategory']['modified'] = date('Y-m-d H:i:s');
	
	if ($movieCategory->save($data)) {
		header('Location: index.php');
	}
}
?>
<!DOCTYPE html>
<title>Movie Category Edit</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/gnav.php'; ?>

<div class="heading">Movie Category Create</div>
	<form action="" class="form" method="post">
		<?php echo $movieCategory->form->input('id'); ?>
		<section>
			<dl>
				<dt>
					Title
				</dt>
				<dd>
					<?php echo $movieCategory->form->input('title'); ?>
					<?php echo $movieCategory->form->error('title'); ?>
				</dd>
			</dl>
		</section>
		<section>
			<dl>
				<dd>
					<input type="submit" name="submit" value="Save" class="btn btn-green">
				</dd>
			</dl>
		</section>
	</form>
	
</body>
</html>