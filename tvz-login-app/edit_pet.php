<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
   /* if(!isset($_POST['email'])) {
        die('email not set');
    } */
    $pet_id = $_POST['pet_id'];
	print_r ($pet_id);
    $pet_type = $_POST['pet_type'];
    $name = $_POST['name'];
    $age = $_POST['age'];
	$gardner = $_POST['gardner'];
	$weight = $_POST['weight'];

    $sql = 'UPDATE pets SET pet_type = :pet_type,
    name = :name, age = :age, gardner =:gardner, weight = :weight
    WHERE pet_id = :pet_id';

    $stmt = $db->prepare($sql);
	$stmt->bindParam(':pet_id', $pet_id);
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

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

if(!isset($_GET['pet_id'])) {
  die('no pet id');
} 

$pet_id = $_GET['pet_id']; 

// get pet
$sql = 'SELECT pet_id, pet_type, name, age, gardner, weight FROM pets WHERE pet_id = :pet_id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':pet_id', $pet_id);
$stmt->execute();
$pet = $stmt->fetch();

?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Edit pet</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="edit_pet.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" value="<?= $pet['pet_id'] ?>" name="pet_id" />
                  <label for="pet_type">Pet type</label>
                  <input type="text" class="form-control form-control-lg rounded-0" name="pet_type"
                         id="pet_type" required="" value="<?= $pet['pet_type'] ?>">
                </div>
                <div class="form-group">
                  <label for="name">Name</label>
                  <input type="text" name="name" value="<?= $pet['name'] ?>"
                         class="form-control form-control-lg rounded-0" id="name">
                </div>
                <div class="form-group">
                  <label for="age">Age</label>
                  <input type="text" name="age" value="<?= $pet['age'] ?>"
                         class="form-control form-control-lg rounded-0" id="age">
                </div>
				<div class="form-group">
                  <label for="gardner">Gardner</label>
                  <input type="text" name="gardner" value="<?= $pet['gardner'] ?>"
                         class="form-control form-control-lg rounded-0" id="gardner">
                </div>
				<div class="form-group">
                  <label for="weight">Weight</label>
                  <input type="text" name="weight" value="<?= $pet['weight'] ?>"
                         class="form-control form-control-lg rounded-0" id="weight">
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