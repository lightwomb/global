<?php
// A class to help work with Sessions
// In our case, primarily to manage logging users in and out

// Keep in mind when working with sessions that it is generally 
// inadvisable to store DB-related objects in sessions

class Session {
	
	private $logged_in=false;
	public $user_id;
	public $current_user;
	public $message;
	
	function __construct() {
		session_start();
		$this->check_message();
		$this->check_login();
    if($this->logged_in) {
      // actions to take right away if user is logged in:
			//echo 'You are in the CONSTRUCT homie...AAAND you are logged in as '. $this->check_id();
    } else {
      // actions to take right away if user is not logged in
			//echo 'You are in the CONSTRUCT homie!';
    }
	}
	
  public function is_logged_in() {
    return $this->logged_in;
  }

  public function currentUser() {
    echo $this->check_username();
  }

	public function login($user, $username) {
    // database should find user based on username/password
    if($user){
      $this->user_id = $_SESSION['user_id'] = $user->id;
      $this->logged_in = true;
    }
		if($username){
      $this->current_user = $_SESSION['current_user'] = $user->username;
    }
  }
  
  public function logout() {
    unset($_SESSION['user_id']);
    unset($this->user_id);
    $this->logged_in = false;
  }

	public function message($msg="") {
	  if(!empty($msg)) {
	    // then this is "set message"
	    // make sure you understand why $this->message=$msg wouldn't work
	    $_SESSION['message'] = $msg;
	  } else {
	    // then this is "get message"
			return $this->message;
	  }
	}

	private function check_login() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      $this->logged_in = true;
    } else {
      unset($this->user_id);
      $this->logged_in = false;
    }
  }
  
	private function check_id() {
    if(isset($_SESSION['user_id'])) {
      $this->user_id = $_SESSION['user_id'];
      return $this->user_id;
    } else {
      unset($this->user_id);
      return $this->user_id;
    }
  }

	private function check_username() {
    if(isset($_SESSION['current_user'])) {
      $this->current_user = $_SESSION['current_user'];
      return $this->current_user;
    } else {
      unset($this->current_user);
      return $this->current_user;
    }
  }

	private function check_message() {
		// Is there a message stored in the session?
		if(isset($_SESSION['message'])) {
			// Add it as an attribute and erase the stored version
      $this->message = $_SESSION['message'];
      unset($_SESSION['message']);
    } else {
      $this->message = "";
    }
	}
	
}

$session = new Session();
$message = $session->message();

?>