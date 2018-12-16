<?php
class Database {
  private $user = "root";
  private $pass = "";
  private $host = "localhost";
  private $dbname = "pkmgo_db_test";
  public $conn;

  public function getConnection(){
    $this->conn = null;

    try {
      $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->pass);
      $this->conn->exec("set name utf8");
    } catch (PDOException $exception) {
      echo "Database connection error: " . $exception->getMessage();
    }

    return $this->conn;
  }
}

?>
