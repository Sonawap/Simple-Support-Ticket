<?php
require_once '../../../core/config.php';
require_once base_path('core/classes.php');

if (isset($_POST['create'])) {
    $image_type=$_FILES['pic']['name'];
    $type = $_FILES['pic']['name'];


    $temp_file = $_FILES['pic']['tmp_name'];
    $destination = base_path('ticket')."/".$_FILES['pic']['name'];
    move_uploaded_file($temp_file,$destination);
    $pic=$_FILES['pic']['name'];
    $title = $_POST['title'];
    $message = $_POST['message'];
    $department = $_POST['department'];
    
    $run = $user->openTicket($pic, $title, $message, $department);

    if ($run) {
        header("Location: ".base_url('support/user/ticket/index.php?success=Ticket has been opened'));
        exit();
    }else{
        header("Location: ".base_url('support/user/ticket/add.php?error=An error occured, try again'));
        exit();
    }

    
}

?>