<?php
require_once 'Db_conn.php';

class Ref extends Db_conn
{
    public function getAllRef($group_id)
    {
        $sql = "
      SELECT
        refs.id,
        refs.title
      FROM
        refs
      WHERE
        refs.ref_group_id = '{$group_id}'
      ORDER BY
        id
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
}
