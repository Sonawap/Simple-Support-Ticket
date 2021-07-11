<?php
 class User{

	// This is a constructor - it runs once anytime functions is called -so we don't need to require 'connect.php' for every function again
	public function __construct () {
		//  Get config variables
		global $config;
		 // connect
		 $conn = new mysqli($config['DB_SERVER'], $config['DB_USER'], $config['DB_PASSWORD'], $config['DB_NAME']);
		 $this->db = $conn;
		 // check connection
		if ($this->db->connect_error) {
			die("Connection failed: " . $this->db->connect_error);
		}
	}

	// Function to valiadate user's info to remove any kinds of script
    public function check_input($data){
        //// validating inputs
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);

        return $data;
    }

	//  Register user 
	public function register($name, $email, $password){
        $email = $this->check_input($email);
        $password = $this->check_input($password);
        $name = $this->check_input($name);

		$query = "INSERT INTO users (name, email,password) value ('$name','$email','$password')";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
	}

	public function getDepartments(){
        $query = "SELECT * FROM department ORDER BY id DESC ";
        $department = $this->db->query($query) or die($this->db->error.__LINE__);
        return $department;
    }


    public function getUserTickets(){
    	$id = $this->getUserInfoById()['id'];
        $query = "SELECT * FROM tickets where posted_by = '$id' ORDER BY id DESC ";
        $tickets = $this->db->query($query) or die($this->db->error.__LINE__);
        return $tickets;
    }

    public function getAllTickets(){
        $query = "SELECT * FROM tickets ORDER BY id DESC ";
        $tickets = $this->db->query($query) or die($this->db->error.__LINE__);
        return $tickets;
    }

	//  Add Department 
	public function addDepartment($name){
        $name = $this->check_input($name);
  		$id = isset($_SESSION['support_user_id']) ? $_SESSION['support_user_id'] : "" ;
		$query = "INSERT INTO department (name, posted_by) value ('$name','$id')";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
	}


	//  Add Department 
	public function editDepartment($name, $id){
        $name = $this->check_input($name);
		$query = "UPDATE department set name = '$name' where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
	}


	public function closeTicket($id){
		$query = "UPDATE tickets set status = '1' where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
	}


	public function openTickett($id){
		$query = "UPDATE tickets set status = '0' where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
	}

	// Check if email exit
		public function checkIfEmailExist($email){
			$query = "SELECT * FROM users where email = '$email'"; 
			$result = $this->db->query($query) or die($this->db->error.__LINE__);
			$rowCount = $result->num_rows;

			if($rowCount > 0){
				return true;
			}else{
				return false;
			}
	}
	// Login user
	public function login($email,$password){
		$email = $this->check_input($email);
        $password = $this->check_input($password);
		$query = "SELECT * FROM users where email = '$email' and password = '$password' ";
		$result = $this->db->query($query) or die($this->db->error.__LINE__);
		$row = mysqli_fetch_array($result);
		$getUser = $result->num_rows;
		if ($getUser > 0){
			$_SESSION['support_user_id']=$row["id"];
			if ($this->isAdmin()) {
		    	header('location: support/admin/index.php?logged=true');
			}elseif($this->isUser()){
		    	header('location: support/user/index.php?logged=true');
			}
		}else{
		    header('location: index.php?error=Invalid Login Credential');
		}


	}

	// Get support_user_id from Session array
  	public function getUserInfoById(){
  		$id = isset($_SESSION['support_user_id']) ? $_SESSION['support_user_id'] : "" ;
  		$query = "SELECT * FROM users where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		$rows = mysqli_fetch_array($run);
		return $rows;

  	}

  	// Get support_user_id from Session array
  	public function getDepartmentInfoById($id){
  		$query = "SELECT * FROM department where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		$rows = mysqli_fetch_array($run);
		return $rows;

  	}

  	public function getTicketInfoById($id){
  		$query = "SELECT * FROM tickets where id = '$id'";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		$rows = mysqli_fetch_array($run);
		return $rows;

  	}

  	public function openTicket($pic, $title, $message, $department){
  		$pic = $this->check_input($pic);
        $title = $this->check_input($title);
        $message = $this->check_input($message);
        $department = $this->check_input($department);
        $id = $this->getUserInfoById()['id'];
        $t_no = 'TIC-'.rand(100,999).'-SOLA-'.rand(999999, 1000000);

		$query = "INSERT INTO tickets (t_no,title, body,attachment, posted_by, department) value ('$t_no','$title','$message','$pic', $id, $department)";
		$run = $this->db->query($query) or die($this->db->error.__LINE__);
		if ($run) {
			return true;
		}
  	}

  	//// check if user is admin
	public function isAdmin(){
		if($this->getUserInfoById()['type'] == "admin"){
			return true;
		}else{
			return false;
		}
	}
	

	///// check if user is a User
	public function isUser(){
		if($this->getUserInfoById()['type'] == "user"){
			return true;
		}else{
			return false;
		}
	}

}