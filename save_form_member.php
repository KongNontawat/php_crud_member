<?php 

require_once 'classes/Persons.php';
$personObj = new Person();

if (isset($_POST['submit']) && $_POST['action'] == 'add') {
  unset($_POST["submit"],$_POST['action'], $_POST['id']);
  $result = $personObj->add_person($_POST);
  if ($result) {
    header('location: index.php?add_success');
  } else {
    header('location: form_member.php?add_error');
  }
} elseif (isset($_POST['submit']) && $_POST['action'] == 'edit') {
    unset($_POST["submit"],$_POST['action']);
  $result = $personObj->edit_person($_POST);
  print_r($_POST);
  if ($result) {
    header('location: index.php?edit_success');
  } else {
    header('location: form_member.php?edit_error');
  }
}

if ($_REQUEST['action'] == 'delete') {
  unset($_REQUEST["action"]);
  $result = $personObj->delete_person($_REQUEST['id']);
  if ($result) {
    header('location: index.php?delete_success');
  } else {
    header('location: index.php?error');
  }
}

?>