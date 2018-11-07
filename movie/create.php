<?php
require_once '../lib/config/const.php';
require_once '../lib/config/database.php';
require_once '../lib/base/Helper.php';
require_once '../lib/model/Movie.php';

$movie = new Movie();
$success = false;

if ($_POST) {
	$data = $_POST['data'];
	$data['Movie']['created'] = date('Y-m-d H:i:s');
	$data['Movie']['modified'] = date('Y-m-d H:i:s');
	
	if ($movie->save($data)) {
		Helper::redirect('movie');
	}
}
?>
<!DOCTYPE html>
<title>Movie Create</title>
<?php include "../templates/css.php"; ?>
<?php include "../templates/js.php"; ?>
</head>
<body>

<?php include '../templates/head.php'; ?>
<?php include '../templates/gnav.php'; ?>

<div class="heading">Movies Create</div>
<form action="" class="form" method="post">
	<section>
		<dl>
			<dt>
				Title
			</dt>
			<dd>
				<?php echo $movie->form->input('title'); ?>
				<?php echo $movie->form->error('title'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Open Date
			</dt>
			<dd>
				<?php echo $movie->form->input('open_date'); ?>
				<?php echo $movie->form->error('open_date'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Description
			</dt>
			<dd>
				<?php echo $movie->form->input('description'); ?>
				<?php echo $movie->form->error('description'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Trial URL
				<p class="alert">Only Youtube Video</p>
			</dt>
			<dd>
				https://www.youtube.com/watch?v=<?php echo $movie->form->input('trial_url'); ?>
				<?php echo $movie->form->error('trial_url'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Duration
			</dt>
			<dd>
				<?php echo $movie->form->input('duration'); ?> minutes
				<?php echo $movie->form->error('duration'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Director
			</dt>
			<dd>
				<?php echo $movie->form->input('director'); ?>
				<?php echo $movie->form->error('director'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Actor
			</dt>
			<dd>
				<?php echo $movie->form->input('actor'); ?>
				<?php echo $movie->form->error('actor'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Language
			</dt>
			<dd>
				<?php echo $movie->form->input('language'); ?>
				<?php echo $movie->form->error('language'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Country
			</dt>
			<dd>
				<?php echo $movie->form->input('country'); ?>
				<?php echo $movie->form->error('country'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dt>
				Category
			</dt>
			<dd>
				<?php echo $movie->form->input('category_id'); ?>
				<?php echo $movie->form->error('category_id'); ?>
			</dd>
		</dl>
	</section>
	<section>
		<dl>
			<dd>
				<input type="submit" name="submit" value="Create" class="btn btn-green">
			</dd>
		</dl>
	</section>
</form>

</body>
</html>