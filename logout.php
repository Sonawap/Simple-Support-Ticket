<?php
require ('core/config.php');
require base_path('core/middleware.php');
$middleware  = new Middleware();
$middleware->logout();

?>