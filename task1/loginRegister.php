<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com"> 
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>
    <?php
        if(isset($_POST['register'])){
            require('./inc/db.php');
            
            $userName = filter_var($_POST['fullName'], FILTER_SANITIZE_STRING);
            $userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
            $userPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
            $userPasswordHashed = password_hash($userPassword, PASSWORD_DEFAULT);
            $totalUser = 0;
            if( filter_var($userEmail, FILTER_SANITIZE_EMAIL)){
                $stmt = $pdo -> prepare('SELECT * from users where email =  ? ');
                $stmt -> execute([$userEmail]);
                $totalUser = $stmt-> rowCount();
            }
            
            if($totalUser > 0 ){
                $taken = 'only one account is allowed with for one person and that is taken';
            }else{
                $emails = $pdo -> prepare('INSERT into users(name, email, password) VAlUES ( ?, ? ,  ?)');
                $emails-> execute( [$userName, $userEmail, $userPasswordHashed] );
                header('Location: http://localhost/task1/login.php');
            }
        }
    ?>
<section id="registerPage" class="">
    <h1>Welcom to ezoic inventory management System</h1>
        <form id="register" action="loginRegister.php" name="register" method="Post">
            <input type="text" name="fullName" id="fullName" placeholder="full Name">
            <input type="email" name="userEmail" id="userEmail" placeholder="userEmail">
            <?php
                if(isset($taken)){
                    echo "<P> $taken </p>";
                }else{
                    echo '';
                }
            ?>
            <input type="password" name="password" id="password" placeholder="password">
            <button name="register" type="submit" class="btn btn-primary">Register</button>
        </form>
</section>

<?php require('./inc/footer.html');?>