<?php
require_once 'core/config.php';
require_once base_path('core/classes.php');

if(isset($_SESSION['support_user_id'])){
    header('location: support/index.php');
}

if (isset($_POST['login'])) {
	$login = $user->login($_POST['email'], md5($_POST['password']));
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
			<form action="index.php" method="POST">
				<div class="input-wrap">
					<label for="email"></label>
					<input type="email" id="email"  class="form-input" name="email" required placeholder="Email">
				</div>

				<div class="input-wrap">
					<label for="password"></label>
					<input type="password" name="password" class="form-input" id="password" required placeholder="password">
				</div>

				<div class="input-wrap">
					<button type="submit" class="btn btn-success" name="login">Login</button>
				</div>

				<a href="create.php">New here? Create an account</a>
			</form>
		</div>
	</div>
</body>
</html>