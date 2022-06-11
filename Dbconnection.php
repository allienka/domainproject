<?php

class Database {
// here you can add  connection config ya amira 
  private $host, $database, $username, $password,$autoconnect;
  public  $connection;
 //classconstruct
  function __construct() {
    $this->autoconnect     = true;
    $this->host            = "localhost";
    $this->database        = "domain_db";
    $this->username        = "root";
    $this->password        = "";
    if($this->autoconnect ) $this->open();
  }
  /**
  * Open the connection to your database.
  */
  private function open() {
    $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
  }
    /**
  * Close the connection to your database.
  */
  public function __destruct()
  {
    $this->connection->close();
  }
// this  general function to exceute any kind of query
  function query($query) {
    return $this->connection->query($query);
  }
}
?>