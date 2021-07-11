<?php
require_once '../../../core/config.php';
require_once base_path('core/classes.php');

$middleware->auth();
$middleware->userMiddleware();

$id = $_GET['id'];
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
						<a class="btn btn-success" href="<?php echo base_url('support/user/ticket/index.php') ?>">All Rows</a>
						<?php echo $message->setMessage() ?>

						<div class="mt-5">
							<h4>Ticket No: <?php echo $user->getTicketInfoById($id)['t_no']; ?></h4>
							<h4>Title: <?php echo $user->getTicketInfoById($id)['title']; ?></h4>
							<h4>Message: <?php echo $user->getTicketInfoById($id)['body']; ?></h4>
							<h5>Department: <?php echo $user->getDepartmentInfoById($user->getTicketInfoById($id)['department'])['name']; ?></h5>
							<h4>Status: <?php echo $user->getTicketInfoById($id)['status'] ? 'closed' : 'open';?></h4>
							<?php if ($user->getTicketInfoById($id)['attachment']) : ?> 
								<a href="<?php echo base_url('ticket/'). $user->getTicketInfoById($id)['attachment'] ?>" target="_blank">View Attachment file</a>
							<?php else : ?>
								No Attachment found
							<?php endif ?>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>