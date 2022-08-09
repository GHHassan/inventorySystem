<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'einventory';

$dsn = 'mysql:host=' . $host . '; dbname=' . $dbname. '; user='. $user . '; password=' . $password;

try {
  $pdo = new PDO($dsn);
  $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
  echo "connection failed" . $e->getMessage();
}
?>