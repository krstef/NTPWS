<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

  /*  if(!isset($_POST['email']) || !isset($_POST['password'])) {
        die('email or password not set');
    } */

    $pet_type = $_POST['pet_type'];
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gardner = $_POST['gardner'];
	$weight = $_POST['weight'];

/*    if($password !== $passwordRepeat) {
        die('password and password repeat are not the same');
    }

    $password = password_hash($password, PASSWORD_DEFAULT); */

    $sql = 'INSERT INTO pets (pet_type, name, age, gardner, weight) VALUES
            (:pet_type, :name, :age, :gardner, :weight)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':pet_type', $pet_type);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':gardner', $gardner);
	$stmt->bindParam(':weight', $weight);
    $stmt->execute();

    header('Location: pet_crud.php');
    die;
}


echo $head;
echo $header;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add pet</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="add_pet.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="pet_id" />
                  <label for="pet_type">Pet type</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="pet_type"
                         id="pet_type" required="">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name"
                         class="form-control form-control-lg rounded-0" id="name" required="">
                </div>
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" name="age"
                         class="form-control form-control-lg rounded-0" id="age" required="">
                </div>
                <div class="form-group">
                  <label for="gardner">Gardner</label>
                  <input type="text" name="gardner"
                         class="form-control form-control-lg rounded-0" id="gardner" required="">
                </div>
                <div class="form-group">
                  <label for="weight">Weight</label>
                  <input type="text" name="weight"
                         class="form-control form-control-lg rounded-0" id="weight" required="">
                </div>
                <button type="submit" class="btn btn-success float-right">Save</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>