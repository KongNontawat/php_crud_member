<?php 
session_start();
require_once 'Db_conn.php';

class Auth extends Db_conn {

	public function createUser($user)
	{

		if ($user['password'] === $user['password2']) {
			$user['password'] = password_hash($user['password'], PASSWORD_DEFAULT);
			unset($user['password2']);
		} else {
			return false;
		}

		$sql = "
			INSERT INTO users (
				name,
				email,
				password
			) VALUES (
				:name,
				:email,
				:password
			)";

		$stmt = $this->connect()->prepare($sql);
		$result = $stmt->execute($user);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function check_login($user)
	{
		$sql = "
			SELECT
				id,
				name,
				email,
				role,
				password
			FROM
				users
			WHERE
				users.email = ?
		";

		$stmt = $this->connect()->prepare($sql);
		$stmt->execute([$user['email']]);
		$result = $stmt->fetchAll();
		$data_DB = $result[0];
		if (password_verify($user['password'], $data_DB['password'])) {
			$_SESSION['id'] = $data_DB['id'];
			$_SESSION['name'] = $data_DB['name'];
			$_SESSION["email"] = $data_DB['email'];
			$_SESSION["role"] = $data_DB['role'];
			$_SESSION["login"] = true;
			return true;
		} else {
			return false;
		}
	}
}

?>