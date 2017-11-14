<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  $rootUrl = 'https://api.github.com/users/';

  if(!isset($_POST['username'])) {
    die('no username');
  }

  $username = $_POST['username'];

  $url = $rootUrl . $username . '/repos';

  $context = stream_context_create([
    'http' => [
      'header' => 'User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/50.0.2661.102 Safari/537.36'
    ]
  ]);
  $data = file_get_contents($url, false, $context);
  $repos = json_decode($data, true);
}

?>
<div class="container content-wrapper">
  <div class="row">
    <form class="form-inline" method="POST" action="api.php">
      <div class="form-group mx-sm-3">
        <label for="username" class="sr-only">Username</label>
        <input type="textfield" class="form-control" id="username" name="username" placeholder="username">
      </div>
      <button type="submit" class="btn btn-primary">Get</button>
    </form>
  </div>

  <?php if($_SERVER['REQUEST_METHOD'] === 'POST' && count($repos) > 0): ?>
  <div class="show-username"><?= 'Showing data for: ' . $username ?></div>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Name</th>
      <th>Created at</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($repos as $repo): ?>
    <tr>
      <th scope="row"><?= $repo['id'] ?></th>
      <td><?= $repo['name'] ?></td>
      <td><?= date('Y-m-d', strtotime($repo['created_at'])) ?></td>
      <td>
        <a target="_blank" href="<?= $repo['html_url'] ?>"><span class="oi oi-external-link"></span></a>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
  <?php endif; ?>
</div>