<?php
  class Database{
    private $server_name = "localhost"; //127.0.0.1 =IP ADRESS
    private $username = "root";
    private $db_password = "root"; //MAMP = root, XAMMP = ""
    private $db_name = "the_company";
    protected $conn;

    public function __construct(){
      $this->conn = new mysqli($this->server_name, $this->username, $this->db_password, $this->db_name);

      if($this->conn->connect_error){
          die("Unable to connect to the database " . $this->conn->connect_error);
      }
    }
  }

?>