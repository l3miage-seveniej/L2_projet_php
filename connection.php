<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

$pdo = new PDO('mysql:host=localhost;dbname=groupe3','martelna','toto');
// $results = $pdo->exec('INSERT…');
$results=$pdo->query('SELECT * FROM test;');
foreach($results as $row) {
  var_dump($row);
  echo $row['nom'];
  echo $row['prenom'];
  echo $row['poid'];
  echo $row['taille'];
}
