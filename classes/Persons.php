<?php 
require 'Db_conn.php';

class Person extends Db_conn
{
  public function getAllpersons()
  {
    $sql = "
      SELECT 
        persons.id,
        persons.firstname,
        persons.nickname,
        persons.dob,
        persons.salary,
        refs.title AS gender,
        clubs.title AS club
      FROM 
        persons
        LEFT JOIN refs ON persons.gender_id = refs.id
        LEFT JOIN clubs ON persons.club_id = clubs.id
      ORDER BY
        persons.gender_id,
        persons.dob
      ";

    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();
    if($data) {
      return $data;
    } else {
      return "false";
    }
  }
}

?>