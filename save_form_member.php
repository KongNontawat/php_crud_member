<?php 
require_once 'classes/Persons.php';
include 'components/check_login.php';

$personObj = new Person();

if ($_FILES['upload_img']['tmp_name']) {
  $ext = end(explode('.', $_FILES['upload_img']['name']));
  $path = "Image/upload/" . md5(uniqid()) . ".{$ext}";
}



// exit;

if (isset($_POST['submit']) && $_POST['action'] == 'add') {
  unset($_POST["submit"],$_POST['action'], $_POST['id']);
  $_POST['img_path'] = $path;
  $result = $personObj->add_person($_POST);
  if ($result) {
    move_uploaded_file($_FILES['upload_img']['tmp_name'], $path);
    header('location: index.php?add_success');
  } else {
    header('location: form_member.php?add_error');
  }
} elseif (isset($_POST['submit']) && $_POST['action'] == 'edit') {
  unset($_POST["submit"],$_POST['action']);
  if ($_FILES['upload_img']['tmp_name']) {
    if ($_POST['img_path']) {
      unlink($_POST['img_path']);
    }
    $_POST['img_path'] = $path;
    move_uploaded_file($_FILES['upload_img']['tmp_name'], $path);
  }
  $result = $personObj->edit_person($_POST);
  if ($result) {
    header('location: index.php?edit_success');
  } else {
    header('location: form_member.php?edit_error');
  }
}

if ($_REQUEST['action'] == 'delete') {
  unset($_REQUEST["action"]);
  $check = $personObj->show_edit_person($_REQUEST['id']);
  if ($check['img_path']) {
    unlink($check['img_path']);
  }
  $result = $personObj->delete_person($_REQUEST['id']);
  if ($result) {
    header('location: index.php?delete_success');
  } else {
    header('location: index.php?error');
  }
}

?>