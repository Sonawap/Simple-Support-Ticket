<?php
require_once '../../../core/config.php';
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
					<div class="con-wrapper">
						<h5 class="text-header menu-text">Tickets</h5>
						

						<?php echo $message->setMessage() ?>

						<div class="table-responsive mt-5">
					        <table class="table">
					            <thead>
					                <tr>
					                    <th>id </th>
					                    <th>Title </th>
					                    <th>Department </th>
					                    <th>Date Posted</th>
					                    <th>Status </th>
					                    <th>Action </th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php $row = $user->getAllTickets();
			                        	foreach ($row as $key => $value): ?>
			                        		<tr>
							                    <td><?php  echo $value['t_no'];?> </td>
							                    <td><?php echo $value['title'];?> </td>
							                    <td><?php echo $user->getDepartmentInfoById($value['department'])['name'] ?></td>
							                    <td><?php echo $value['dateposted'];?> </td>
							                    <td><?php echo $value['status'] ? 'closed' : 'open';?> </td>

							                    <td>
							                    	<a href="view.php?id=<?php echo $value['id']?>" class="btn btn-primary-outline">View</a>
							                 
							                	</td>
							                </tr>
			                        <?php endforeach;?>
					                
					            </tbody>
					        </table>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>