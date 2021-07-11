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
						<h5 class="text-header menu-text">Departments</h5>
						<a class="btn btn-success mb-5" href="add.php">Add New Row</a>
						<?php echo $message->setMessage() ?>

						<div class="table-responsive mt-5">
					        <table class="table">
					            <thead>
					                <tr>
					                    <th>id </th>
					                    <th>Department </th>
					                    <th>Action </th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php $row = $user->getDepartments();
			                        	foreach ($row as $key => $value): ?>
			                        		<tr>
							                    <td><? echo $value['id'];?> </td>
							                    <td><? echo $value['name'];?> </td>
							                    <td>
							                    	<a href="edit.php?id=<?php echo $value['id']?>" class="btn btn-primary-outline">Edit</a>
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