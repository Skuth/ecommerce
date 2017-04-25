<?php

namespace DB

class Sql
{

  const HOSTNAME = "localhost";
  const DBNAME = "db_ecommerce";
  const USERNAME = "root";
  const PASSWORD = "";

  private $conn;

  public function __construct()
  {
    $this->conn = new \PDO(
      "mysql:host=".self::HOSTNAME.";dbname=".self::DBNAME,
      self::USERNAME,
      self::PASSWORD);
  }

  public function setParams($statement, $parameters = array())
  {
    foreach ($parameters as $key => $value) {
      $this->bindParam($statement, $key, $value);
    }
  }

  public function bindParam($statement, $key, $value)
  {
    $statement->bindParam($key, $value);
  }

  public function query($rawQuery, $params = array())
  {
    $stmt = $this->conn->prepare($rawQuery);
    $this->setParams($stmt, $params);
    $stmt->execute();
  }

  public function select($rawQuery, $params = array()):array
  {
    $stmt = $this->conn->prepare($rawQuery);
    $this->setParams($stmt, $params);
    $stmt->execute();
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
  }

}
