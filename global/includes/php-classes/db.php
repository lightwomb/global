<?php
class Db {
  protected $userName;
  protected $password;
  protected $dbName;

  public function __construct ( $UserName, $Password, $DbName ) {
    $this->userName = $UserName;
    $this->password = $Password;
    $this->dbName = $DbName;
  }
}

// and you would use this as:
$deeb = new Db ( 'user_name', 'password', 'database_name' );
?>