<?php 
require_once 'Db_conn.php';

class Club extends Db_conn
{
  public function getAllClubs()
  {
    $sql = "
      SELECT 
        clubs.id,
        clubs.title
      FROM 
        clubs
      ORDER BY
        category_id,
        title
      ";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if($data) {
      return $data;
    } else {
      return false;
    }
  }
}

?>