<?php
require_once 'head.php';

// redirect if logged in
if(isset($_SESSION['user'])) {
  header('Location: index.php');
  die;
}

// if HTTP POST
if($_SERVER['REQUEST_METHOD'] === 'POST') {
  if(!isset($_POST['email']) && isset($_POST['password'])) {
    die('Email or password not provided.');
  }

  $email = $_POST['email'];
  $password = $_POST['password'];

  // get user from the database
  $sql = 'SELECT id, email, password, first_name, last_name, is_active FROM users WHERE email = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  $user = $stmt->fetch();

  // error message for username and password
  // never show which one is incorrect
  $errorMessage = 'Wrong username/password combination.';

  // if user doesn't exist
  if(!$user) { die($errorMessage); }

  // check is the user active
  if($user['is_active'] !== '1') {
    die('user not active');
  }

  // check if the password is OK
  if(!password_verify($password, $user['password'])) { die($errorMessage); }

  // log user in
  $_SESSION['user'] = $user;

  // redirect
  header('Location: index.php');
  die;
}

echo $head;

?>

<div class="container">
  <div class="row">
    <div class="col-md-12 login-wrapper">
      <h2 class="text-center">Welcome to TVZ APP</h2>
      <div class="row">
        <div class="col-md-6 mx-auto">
          <div class="card">
            <div class="card-header">
              <h3 class="mb-0">Login</h3>
            </div>
            <div class="card-body">
              <form class="form" role="form" method="POST" action="login.php" autocomplete="off">
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control form-control-lg rounded-0" name="email"
                         id="email" required="">
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password"
                         class="form-control form-control-lg rounded-0" id="password" required="">
                </div>
                <button type="submit" class="btn btn-success float-right">Login</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
