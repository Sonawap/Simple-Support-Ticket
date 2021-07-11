<?php
require_once '../../../core/config.php';
require_once base_path('core/classes.php');

$middleware->auth();
$middleware->userMiddleware();

if (isset($_POST['create'])) {

	$create = $user->addTicket($_POST['name']);
	if ($create) {
	    header('location: index.php?success=Department Added');
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
						<h5 class="text-header menu-text">Tickets</h5>
						<a class="btn btn-success" href="<?php echo base_url('support/user/ticket/index.php') ?>">All Tickets</a>
						<?php echo $message->setMessage() ?>
						<form action="<?php echo base_url('support/user/ticket/upload.php')?>" method="POST" enctype="multipart/form-data">

							<div class="input-wrap mt-5">
								<label for="form-input">Select Department</label>
								<select name="department" id="department" class="form-input mt-1">
									<?php 
				                        $row = $user->getDepartments();
				                        foreach ($row as $key => $value):
			                        ?>
			                        	<option value="<?php echo $value['id'];?>"><?php echo $value['name'];?></option>
			                        <? endforeach;?>
								</select>
							</div>
							<div class="input-wrap mt-5">
								<label for="title">Title</label>
								<input type="text" id="title"  class="form-input mt-1" name="title" required placeholder="Ticket title">
							</div>

							<div class="input-wrap mt-5">
								<label for="title">Message</label>
								<textarea class="form-textarea mt-1" id="message" cols="4" rows="5" name="message" placeholder="Message"></textarea>
							</div>

							<div class="input-wrap">
					            <label for="file" class="btn btn-primary-outline">Select your attachment</label>
					            <input type="file" name="pic" style="display: none;" id="file"><br>
					        </div>

							<div class="input-wrap">
								<button type="submit" name="create" class="btn btn-success">Submit Ticket</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>