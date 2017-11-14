<?php
require_once 'head.php';
if(!isset($_GET['pet_id'])) {
  die('there is no ID parameter');
}
$pet_id = (int)$_GET['pet_id'];

$sql = 'DELETE FROM pets WHERE pet_id = :pet_id';
$stmt = $db->prepare($sql);
$stmt->bindParam(':pet_id', $pet_id);
$stmt->execute();

header('Location: pet_crud.php');
die();
