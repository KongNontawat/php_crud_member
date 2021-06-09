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
        <div class="card-header bg-primary text-white d-flex justify-content-between">
          <h3>CRUD Member</h3>
          <a href="form_member.php" class="btn btn-success">Add+</a>
        </div>
        <div class="card-body">
          <table class="table">
            <thead class="table-light">
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
                    <a href="form_member.php?id=<?= $person['id']?>" class="btn btn-warning py-0 px-1"><i class="fas fa-edit"></i></a>
                    <a href="save_form_member.php?action=delete&id=<?= $person['id']?>" class="btn btn-danger py-0 px-1"><i class="fas fa-trash-alt"></i></a>
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

