<?php
require_once '../../../core/config.php';
require_once base_path('core/classes.php');

$middleware->auth();
$middleware->adminMiddleware();

if (isset($_POST['create'])) {

	$create = $user->addDepartment($_POST['name']);
	if ($create) {
	    header('location: get.php?success=Department Added');
	}else{
	    header('location: add.php?error=Account cannot be created');
	}	
	
}
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
					<div class="con-wrapper">
						<h5 class="text-header menu-text">Departments</h5>
						<a class="btn btn-success" href="get.php">All Rows</a>
						<?php echo $message->setMessage() ?>
						<form action="add.php" method="POST">
							<div class="input-wrap mt-5">
								<label for="name">Department Name</label>
								<input type="text" id="name"  class="form-input mt-1" name="name" required placeholder="Department Name">
							</div>

							<div class="input-wrap">
								<button type="submit" name="create" class="btn btn-success">Add Department</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>