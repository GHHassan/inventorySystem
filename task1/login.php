
    <?php
        if(isset($_POST['register'])){
            require('./inc/db.php');
            
            $userName = htmlspecialchars($_POST['fullName']);
            $userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
            $userPassword = htmlspecialchars($_POST['password']);
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
                $emails = $pdo -> prepare('INSERT into users(name, email, password) VAlUES ( ?, ? , ?)');
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
