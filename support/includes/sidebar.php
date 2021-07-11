<div class="sm-col">
	<div class="sidebar">
		<h5 class="text-header menu-text">Menu</h5>
		<ul>			
			<?php if($user->isAdmin()) : ?>
				<li><a href="<?php echo base_url('support/admin/index.php') ?>">Dashboard</a></li>
				<li><a href="<?php echo base_url('support/admin/ticket/index.php') ?>">Tickets</a></li>
				<li><a href="<?php echo base_url('support/admin/department/get.php') ?>">Departments </a></li>

			<?php endif ?>

			<?php if($user->isUser()) : ?>
				<li><a href="<?php echo base_url('support/user/index.php') ?>">Dashboard</a></li>
				<li><a href="<?php echo base_url('support/user/ticket/index.php') ?>">Tickets</a></li>
			<?php endif ?>


		</ul>
	</div>

</div>