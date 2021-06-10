<?php 

if (!$_SESSION['login'] === true) {
  header('location: auth/login.php');
  exit;
}


?>