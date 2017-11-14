<?php

require_once 'head.php';

// redirect if not logged in
if (!isset($_SESSION['user'])) {
  header('Location: login.php');
  die;
}

echo $head;
echo $header;

if (isset($_POST['username'])) { //provjeri je li username pravi
$username = $_POST ['username']; //u username spremi username iz html forme
$url = 'https://dog.ceo/api/breeds/list/all'; //url na kojem se nalazi api;

$data = file_get_contents($url); // u data spremi sve sa url
$breeds = json_decode($data, true); // pretvori xml u json

//print_r($breeds); debug tool
if($breeds['status'] !== 'success') { //provjeri je status - uspjesno spojen api
	die('server problem');
}

$breeds = $breeds['message']; //u breeds spremi message

echo '<table border="1">';
foreach ($breeds as $key => $value) { //dohvacanje polja
	echo "<tr><td>{$key}</td></tr>";
}
}

?>
	
<form method="POST" action="dog.php">
	Username:
	<div>
		<input type ="text" name="username" />
	</div>
</form>
