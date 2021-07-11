<div class="header">
	<h1 class="user-header">Welcome <?php echo $user->getUserInfoById()['name'] ?></h1>
	<h3 class="user-text"><?php echo $user->getUserInfoById()['email'] ?></h3>
	<h3 class="user-text"><?php echo $user->isAdmin() ? 'Administrator' : ''?></h3>
	<a href="<?php echo base_url('logout.php') ?>" class="btn btn-danger float-right">Logout</a>
	<hr>
</div>