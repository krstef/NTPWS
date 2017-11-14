<?php
require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

// get users
$sql = 'SELECT id, email, first_name, last_name, is_active FROM users';
$stmt = $db->prepare($sql);
$stmt->execute();
$users = $stmt->fetchAll();
?>

<div class="container content-wrapper">
  <a href="add.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Email</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($users as $user): ?>
    <tr class="<?= $user['is_active'] !== '1' ? 'inactive' : '' ?>">
      <th scope="row"><?= $user['id'] ?></th>
      <td><?= $user['email'] ?></td>
      <td><?= $user['first_name'] ?></td>
      <td><?= $user['last_name'] ?></td>
      <td>
        <a href="edit.php?id=<?= $user['id'] ?>""><span class="oi oi-pencil"></span></a>
        <a href="delete.php?id=<?= $user['id'] ?>"><span class="oi oi-delete"></span></a>

        <?php $isMyId = $user['id'] === $_SESSION['user']['id']; ?>
        <?php if(!$isMyId): ?>
          <?php if($user['is_active'] !== '1'): ?>
            <a href="change_activation.php?id=<?= $user['id'] ?>"><span class="oi oi-check"></span></a>
          <?php else: ?>
            <a href="change_activation.php?id=<?= $user['id'] ?>"><span class="oi oi-ban"></span></a>
          <?php endif; ?>
        <?php endif; ?>
      </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $footer ?>
