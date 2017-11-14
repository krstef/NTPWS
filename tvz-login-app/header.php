<?php

$header = <<<EOT
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="/">%s</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
	  <li class="nav-item">
		<a class="nav-link" href="index.php">HOME</a>
	  </li>
      <li class="nav-item">
		<a class="nav-link" href="pet_crud.php">CRUD</a>
	  </li>
	  <li class="nav-item">
		<a class="nav-link" href="dog.php">Dog</a>
	  </li>
	  <li class="nav-item">
        <a class="nav-link" href="api.php">GitHub</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">Logout</a>
      </li>
    </ul>
  </div>
</nav>
EOT;

// inject title into '%s'
$header = sprintf($header, APP_NAME);
