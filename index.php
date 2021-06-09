<?php
// error_reporting(0);

require_once 'classes/Persons.php';
require_once 'classes/Ref.php';
require_once 'classes/Club.php';

$personObf = new Person();
$genderObj = new Ref();
$clubObf = new Club();

$filter = array_intersect_key($_REQUEST, array_flip(['search', 'gender_id', 'club_id']));

$persons = $personObf->getAllpersons($filter);
$genders = $genderObj->getAllRef(2);
$clubs = $clubObf->getAllClubs();
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

          <form action="" method="GET" class="form-inline mb-3">

            <div class="row">
              <div class="col-3 col-md-3">
                <div class="input-group">
                  <span class="input-group-text"><i class="fas fa-search"></i></span>
                  <input type="text" name="search" id="" class="form-control"
                    value="<?=($_GET['search']) ? $_GET['search'] : '' ?>">
                </div>
              </div>

              <div class="col-3 col-md-2">
                <div class="input-group">
                  <span class="input-group-text">เพศ</span>
                  <select name="gender_id" id="" class="form-select">
                    <option value="">ทั้งหมด</option>
                    <?php foreach($genders as $gender) :?>
                    <?php $selected = ($gender['id'] == $_GET['gender_id']) ? 'selected' : '';  ?>
                    <option value="<?= $gender['id']?>" <?= $selected ?>><?= $gender['title']?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="col-3 col-md-2">
                <div class="input-group">
                  <span class="input-group-text">ชมรม</span>
                  <select name="club_id" id="" class="form-select">
                    <option value="">ทั้งหมด</option>
                    <?php foreach($clubs as $club) :?>
                    <?php $selected = ($club['id'] == $_GET['club_id']) ? 'selected' : '';  ?>
                    <option value="<?= $club['id']?>" <?= $selected ?>><?= $club['title']?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>

              <div class="col-1">
                <button type="submit" name="search_submit" class="btn btn-primary">ค้นหา</button>
              </div>
            </div>
          </form>

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
                <td><?=$n?></td>
                <td><?=$person['firstname']?></td>
                <td><?=$person['nickname']?></td>
                <td><?=$person['dob']?></td>
                <td><?=$person['gender']?></td>
                <td><?=$person['club']?></td>
                <td><?=$person['salary']?></td>
                <td>
                  <a href="form_member.php?id=<?=$person['id']?>" class="btn btn-warning py-0 px-1"><i
                      class="fas fa-edit"></i></a>
                  <a href="save_form_member.php?action=delete&id=<?=$person['id']?>" class="btn btn-danger py-0 px-1"><i
                      class="fas fa-trash-alt"></i></a>
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