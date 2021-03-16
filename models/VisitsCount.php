<?php
  class VisitsCount{
    private $conn;
    private $table = 'VisitsCount';

    public function __construct($db){
      $this->conn = $db;
    }

    public function get_visits_count($website_name){
      $query = 
      "SELECT visits FROM VisitsCount
      WHERE website=:website";

      $stmt = $this->conn->prepare($query);
      $stmt->bindParam(':website', $website_name);
      $stmt->execute();
      return $stmt->fetch(PDO::FETCH_ASSOC);
    }
  }

?>