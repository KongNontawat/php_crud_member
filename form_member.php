<?php
error_reporting(0);
require_once 'classes/Persons.php';
require_once 'classes/Ref.php';
require_once 'classes/Club.php';

$personObf = new Person();
$persons = $personObf->getAllpersons();
if (isset($_GET['id'])) {
  $show_edit = $personObf->show_edit_person($_GET['id']);
}
$genderObj = new Ref();
$genders = $genderObj->getAllRef(2);
$clubObf = new Club();
$clubs = $clubObf->getAllClubs();
?>
<?php include 'components/header.php';?>
<?php include 'components/navbar.php';?>

<div class="container">
  <div class="row mt-5 justify-content-center">
    <div class="col-8">
      <div class="card">
        <div class="card-header bg-primary text-white">
          <h3><?=($show_edit) ? 'Edit' : 'ADD' ?> Member</h3>
        </div>
        <div class="card-body">
          <form action="save_form_member.php" method="post">
            <input type="hidden" name="action" value="<?=($show_edit) ? 'edit' : 'add' ?>">
            <input type="hidden" name="id" value="<?= $show_edit['id']?>">
            <div class="my-3">
              <label for="" class="form-label">FirstName</label>
              <input type="text" name="firstname" id="" class="form-control" value="<?= $show_edit['firstname']?>">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">NickName</label>
              <input type="text" name="nickname" id="" class="form-control" value="<?= $show_edit['nickname']?>">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">DOB</label>
              <input type="text" name="dob" id="" class="form-control" value="<?= $show_edit['dob']?>">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Gender</label>
              <select name="gender_id" id="" class="form-control w-50">
              <option value="">เลือก</option>
              <?php foreach($genders as $gender) :?>
                <?php $selected = ($gender['id'] == $show_edit['gender_id']) ? 'selected' : '';  ?>
                <option value="<?= $gender['id']?>" <?= $selected ?>><?= $gender['title']?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Club</label>
              <select name="club_id" id="" class="form-control w-50">
              <option value="">เลือก</option>
              <?php foreach($clubs as $club) :?>
                <?php $selected = ($club['id'] == $show_edit['club_id']) ? 'selected' : '';  ?>
                <option value="<?= $club['id']?>" <?= $selected ?>><?= $club['title']?></option>
              <?php endforeach; ?>
              </select>
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Salary</label>
              <input type="text" name="salary" id="" class="form-control" value="<?= $show_edit['salary']?>">
            </div>
            <div class="mb-3">
                <button type="submit" name="submit" class="btn btn-success"><?=($show_edit) ? 'Update' : 'ADD +' ?></button>
                <a href="index.php" class="btn btn-secondary">Back</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include 'components/footer.php';?>