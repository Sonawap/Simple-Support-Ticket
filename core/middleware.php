<?php

require_once 'user.php';


class Middleware extends User{
    public function auth(){
        if (isset($_SESSION['support_user_id'])) {
            return true;
        }else{
            $this->bounce();
        }
    }

    public function bounce(){
        session_destroy();
		header("Location: ../../../index.php");
		exit();
    }

    public function logout(){
        session_destroy();
        header("Location: index.php");
        exit();
    }

    public function adminMiddleware(){
        if($this->isAdmin()){
            return true;
        }
        elseif($this->isUser()){
            $this->bounce();
        }
    }

    public function userMiddleware(){
        if($this->isUser()){
            return true;
        }
        elseif($this->isAdmin()){
            $this->bounce();
        }
    }
    
}

?>  