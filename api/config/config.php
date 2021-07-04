<?php
header('Access-Control-Allow-Origin: *'); 
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Methods: POST, PUT, GET, DELETE, OPTIONS'); 

// local
// $cn = mysqli_connect("localhost","root","","ubigeo");

// DATABASE HEROKU VARIABLES

// heroku
$cn = mysqli_connect("us-cdbr-east-04.cleardb.com","bbf959296dd944","e22a805b","heroku_0674d50a72a731f");
$cn->set_charset("utf8");

?>

