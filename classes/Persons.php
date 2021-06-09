<?php
require_once 'Db_conn.php';

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
        if ($data) {
            return $data;
        } else {
            return false;
        }
    }

    public function add_person($person)
    {
      $sql = "
      INSERT INTO
      persons (
        firstname,
        nickname,
        dob,
        gender_id,
        club_id,
        salary)
      VALUES (
        :firstname,
        :nickname,
        :dob,
        :gender_id,
        :club_id,
        :salary)";

      $stmt = $this->connect()->prepare($sql);
      $result = $stmt->execute($person);
      if ($result) {
        return true;
      } else {
        return false;
      }
    }

    public function show_edit_person($id)
    {
      $sql = "
      SELECT
        persons.id,
        persons.firstname,
        persons.nickname,
        persons.dob,
        persons.salary,
        persons.gender_id,
        persons.club_id
      FROM
        persons
      WHERE
        id = ?
      ";

        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $data = $stmt->fetchAll();
        if ($data) {
            return $data[0];
        } else {
            return false;
        }
    }

    public function edit_person($person)
    {
        $sql = "
      UPDATE persons SET
        persons.firstname = :firstname,
        persons.nickname = :nickname,
        persons.dob = :dob,
        persons.salary = :salary,
        persons.gender_id = :gender_id,
        persons.club_id = :club_id
      WHERE
        id = :id
      ";

        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute($person);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_person($id)
    {
      $sql = "
      DELETE FROM
        persons
      WHERE
        id = ?
      ";

        $stmt = $this->connect()->prepare($sql);
        $result = $stmt->execute([$id]);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
