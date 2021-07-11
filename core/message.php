<?php
class Message{
	public function setMessage(){
		if(isset($_GET['error'])){
			return "<div class='alert-error'>".$_GET['error']."</div>";
		}

		if(isset($_GET['success'])){
			return "<div class='alert-success'>".$_GET['success']."</div>";
		}
	}
}

?>