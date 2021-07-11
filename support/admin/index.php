<?php
require_once '../../core/config.php';
require_once base_path('core/classes.php');

$middleware->auth();
$middleware->adminMiddleware();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<?php require base_path('support/includes/link.php'); ?>
</head>
<body>
	<div class="container">
		<div class="wrapper bg-white p-50">
			<?php require base_path('support/includes/header.php'); ?>
			<div class="div-row">
				<?php require base_path('support/includes/sidebar.php') ?>
				<div class="lg-col">
					<h1 class="form-header py-50">Welcome <?php echo $user->getUserInfoById()['name'] ?></h1>
				</div>
			</div>
		</div>
	</div>
</body>
</html>