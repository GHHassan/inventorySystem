<?php  
session_start();
require('./inc/header.html');?>



<!-- login validation and processing -->
<?php
    if(isset($_POST['login'])){
        require('./inc/db.php');
       
        $userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
        $userPassword = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        $stmt = $pdo -> prepare('SELECT * FROM `users` WHERE email = ?');
        $stmt -> execute( [$userEmail] );
        $user = $stmt -> fetch();

        if(isset($user)){
            if(password_verify($userPassword, $user -> password)){
                $_SESSION['userEmail'] = $user ->userEmail;
                header('Location: http://localhost/task1/index.php');
                
            }else{
                $wrongLogin = "login detail not corrct";
            }
        }
    }
?>
<section id="loginPage" class="">
    <form id="login" action="login.php" name="login" class="" method="Post">
        
        <input type="email" name="userEmail" id="userEmail" placeholder="userEmail">
        <input type="password" name="password" id="password" placeholder="password">
        <?php if(isset($wrongLogin)){
        echo "<p> $wrongLogin </p>";
        } ?>
        <button name="login" type="submit" class="">login</button>
    </form>
</section>
<?php require('./inc/footer.html');?>