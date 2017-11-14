<?php

require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

// get pets
$sql = 'SELECT pet_id, pet_type, name, age, gardner, weight FROM pets';
$stmt = $db->prepare($sql);
$stmt->execute();
$pets = $stmt->fetchAll();

?>

<div class="container content-wrapper">
  <a href="add_pet.php"><span class="oi oi-plus"></span></a>
  <table class="table table-hover">
    <thead>
    <tr>
      <th>#</th>
      <th>Pet type</th>
      <th>Name</th>
      <th>Age</th>
      <th>Gardner</th>
	  <th>Weight</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($pets as $pet): ?>
	<tr class="<?= $pet['is_active'] !== '1' ? 'inactive' : '' ?>">
      <th scope="row"><?= $pet['pet_id'] ?></th>
      <td><?= $pet['pet_type'] ?></td>
      <td><?= $pet['name'] ?></td>
      <td><?= $pet['age'] ?></td>
	  <td><?= $pet['gardner'] ?></td>
	  <td><?= $pet['weight'] ?></td>
      <td>
        <a href="edit_pet.php?pet_id= <?= $pet['pet_id'] ?>""><span class="oi oi-pencil"></span></a> 
        <a href="delete_pet.php?pet_id=<?= $pet['pet_id'] ?>"><span class="oi oi-delete"></span></a>
	  </td>
	  </tr>
    <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?= $footer ?>