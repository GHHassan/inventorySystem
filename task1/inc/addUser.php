<?php

  if(isset( $_POST['addUser'])) {
    require('./db.php');
    $userName = htmlspecialchars( $_POST["userName"]);
    $userEmail = htmlspecialchars( $_POST["userEmail"]);
    $password = htmlspecialchars( $_POST["password"]);
    $confimePassword = htmlspecialchars( $_POST["confirmPassword"]);
    $passwordHashed = password_hash($password, PASSWORD_DEFAULT);
    $role = htmlspecialchars( $_POST["role"]);
    if( filter_var($userEmail, FILTER_VALIDATE_EMAIL) ) {
      $stmt = $pdo -> prepare('SELECT * from users WHERE email = ? ');
      $stmt -> execute([$userEmail]);
      $totalUsers = $stmt -> rowCount();
      // echo $totalUsers . '<br >';

      if( $totalUsers > 0 ) {
        // echo "Email already been taken <br>";
        $emailTaken = "Email already been taken";
      } else if(isset($userName)&& isset($userEmail) && isset($passwordHashed) && isset($role)) {
        $stmt = $pdo -> prepare('INSERT into users(name, email, password, role) VALUES(? , ?, ?, ? ) ');
        $stmt -> execute( [ $userName, $userEmail, $passwordHashed, $role] );
        echo json_encode($stmt);
      }
    } 
  }
?>
<!-- <?php
header("Location: http://localhost/task1/register.php");
exit();
?> -->