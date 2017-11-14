<?php
session_start();
require_once 'db.php';
require_once 'constants.php';
require_once 'header.php';
require_once 'footer.php';

$head = <<<EOT
<!doctype html>
<html lang="en">
<head>
    <title>%s</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
EOT;

// inject title into '%s'
$head = sprintf($head, APP_NAME);
