<?php
$driver = 'mysql';
$host =  'localhost';
$db_name = 'registration';
$db_user = 'mysql';
$db_pass = 'mysql';

$dbase = "$driver:host=$host;dbname=$db_name";
$pdo = new PDO($dbase, $db_user, $db_pass);
