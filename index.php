<?php
require_once 'classes/Persons.php';
$personObf = new Person();
$persons = $personObf->getAllpersons();
?>
<?php include 'components/header.php';?>
<?php include 'components/navbar.php';?>

<div class="container">
  <div class="row mt-5">
    <div class="col-12">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3>CRUD Member</h3>
        </div>
        <div class="card-body">
          <table class="table">
            <thead>
              <tr>
                <th>#</th>
                <th>Firstname</th>
                <th>Nickname</th>
                <th>DOB</th>
                <th>Gender</th>
                <th>Club</th>
                <th>Salary</th>
                <th style="width: 10%;"></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($persons as $key => $person): ?>
                <?php $n = $key + 1;?>
                <tr>
                  <td><?= $n?></td>
                  <td><?= $person['firstname']?></td>
                  <td><?= $person['nickname']?></td>
                  <td><?= $person['dob']?></td>
                  <td><?= $person['gender']?></td>
                  <td><?= $person['club']?></td>
                  <td><?= $person['salary']?></td>
                  <td>
                    <a href="save_form_member.php?action=edit&id={<?= $person['id']?>}" class="btn btn-warning">แก้ไข</a>
                    <a href="save_form_member.php?action=delete&id={<?= $person['id']?>}" class="btn btn-danger">ลบ</a>
                  </td>
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'components/footer.php';?>

