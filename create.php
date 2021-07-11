<?php
require_once 'core/config.php';
require_once base_path('core/classes.php');

if(isset($_SESSION['support_user_id'])){
    header('location: support/index.php');
}

if (isset($_POST['create'])) {

	$checkEmail = $user->checkIfEmailExist($_POST['email']);
	if ($checkEmail) {
	    header('location: create.php?error=Email Already Registered');
	}else{
		$create = $user->register($_POST['name'], $_POST['email'], md5($_POST['password']));
		if ($create) {
			$user->login($_POST['email'], md5($_POST['password']));
		}else{
		    header('location: create.php?error=Account cannot be created');
		}	
	}
	
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
	<link rel="stylesheet" type="text/css" href="asset/css/style.css">
</head>
<body>
	<div class="container">
		<div class="wrapper bg-white p-50">
			<h1 class="form-header">Welcome to our Online Support System</h1>
			<h3 class="form-text">Create an account</h3>
			<?php echo $message->setMessage() ?>
			<form action="create.php" method="POST">
				<div class="input-wrap">
					<label for="name"></label>
					<input type="text" id="name"  class="form-input" name="name" required placeholder="Name">
				</div>

				<div class="input-wrap">
					<label for="email"></label>
					<input type="email"  class="form-input" id="email" name="email" required placeholder="Email">
				</div>

				<div class="input-wrap">
					<label for="password"></label>
					<input type="password" class="form-input" name="password" id="password" required placeholder="password">
				</div>

				<div class="input-wrap">
					<button type="submit" name="create" class="btn btn-success">Create Account</button>
				</div>

				<a href="index.php">Already have an account? Login now</a>
			</form>
		</div>
	</div>
</body>
</html>