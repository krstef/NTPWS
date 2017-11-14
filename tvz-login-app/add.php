<?php
require_once 'head.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    if(!isset($_POST['email']) || !isset($_POST['password'])) {
        die('email or password not set');
    }

    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRepeat = $_POST['password-repeat'];
    $firstName = $_POST['first-name'];
    $lastName = $_POST['last-name'];

    if($password !== $passwordRepeat) {
        die('password and password repeat are not the same');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO users (email, password, first_name, last_name) VALUES
            (:email, :password, :first_name, :last_name)';

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':first_name', $firstName);
    $stmt->bindParam(':last_name', $lastName);
    $stmt->execute();

    header('Location: index.php');
    die;
}


echo $head;
echo $header;
?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Add user</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-body">
              <form class="form" role="form" method="POST" action="add.php" autocomplete="off">
                <div class="form-group">
                <input type="hidden" name="id" />
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg rounded-0" name="email"
                         id="email" required="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"
                         class="form-control form-control-lg rounded-0" id="password" required="">
                </div>
                <div class="form-group">
                  <label for="password-repeat">Password repeat</label>
                  <input type="password" name="password-repeat"
                         class="form-control form-control-lg rounded-0" id="password-repeat" required="">
                </div>
                <div class="form-group">
                  <label for="first-name">First name</label>
                  <input type="text" name="first-name"
                         class="form-control form-control-lg rounded-0" id="first-name">
                </div>
                <div class="form-group">
                  <label for="last-name">Last name</label>
                  <input type="text" name="last-name"
                         class="form-control form-control-lg rounded-0" id="last-name">
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