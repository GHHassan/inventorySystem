
<?php 
$host = 'localhost';
$user = 'root';
$password = 'MYSQLpassword123';
$dbname = 'einventory';


// // connecting to the database using mysqli
  //  $dbConn = new mysqli($host, $user, $password, $dbname);

  //  // checking the connection and displaying error message if failed
  //  if ($dbConn->connect_error) {
  //     echo "<p>Connection failed: ".$dbConn->connect_error."</p>\n";
      
  //     exit;
  // }

  // connecting to database using pdo
  $dsn = 'mysql:host='. $host . '; dbname=' . $dbname;
 
  try{
   $pdo = new PDO($dsn, $user, $password);
   $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
   $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  }catch(PDOException $e){
    echo"connection failed". $e->getMessage();
  }
?>


