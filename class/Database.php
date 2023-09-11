<?php

class Database {

// private properties
private string $db_host = 'localhost';
private string $db_username = 'root';
private string $db_password = '';
protected string $db_name = 'moduleconnexionb2';





public function dbConnect(): ?object {
    $pdo = null;
    try {

      // ...connect to our database, using the `db_name` variable
      $pdo = new pdo($db_dsn, $this->db_username, $this->db_password, $db_options);
      $this->pdo = $pdo;
    
    } catch (PDOException $e) { 
       // update the connection errors
      $this->updateConnectErrors($this::ERROR_FOUND, "[dbConnect]: Failed to connect to Maxaboom database - " . $e->getMessage());
    }   

    return $pdo; 
  }
}


?>