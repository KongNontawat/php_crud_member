<?php
class Db_conn
{
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "crud_member";

    public function connect()
    {
        try {
            $conn = new PDO("mysql:host=$this->server; dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}