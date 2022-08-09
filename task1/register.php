<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <?php
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.html');
        exit;
    }
    include('./inc/dbcon.php');

    if (isset($_POST['register'])) {        
        $userName = htmlspecialchars($_POST['fullName']);
        $userEmail = filter_var($_POST['userEmail'], FILTER_SANITIZE_EMAIL);
        $userPassword = htmlspecialchars($_POST['password']);
        $confirmPassword = htmlentities($_POST['confirmPassword']);
        $userPasswordHashed = password_hash($userPassword, PASSWORD_DEFAULT);
        $role = htmlspecialchars($_POST['role']);
        $totalUser = 0;
        $stmt = $pdo->prepare('SELECT * from accounts where email =  ? ');
        $stmt->execute([$userEmail]);
        // $stmt = $con->prepare('SELECT * from accounts where email =  ? ');
        // $stmt->bindParam('s', $userEmail);
        // $totalUser = $stmt->rowCount();
       
        if ($totalUser > 0) {
            $taken = 'only one account is allowed with for one person and that is taken';
        } else if($userPassword != $confirmPassword) {
            $notMatched = 'Oops, Passwords did not matched! please try again ;)';
        }else{
            $emails = $pdo->prepare('INSERT into accounts(username, password, email, role) VAlUES ( ?, ? , ?, ?)');
            $emails->execute([$userName, $userPasswordHashed, $userEmail, $role]);
            // $emails = $con->prepare('INSERT into accounts(username, password, email, role) VAlUES ( ?, ? , ?, ?)');
            // $emails->bindParam('ssss', $userName, $userPasswordHashed, $userEmail, $role );
            // $emails->execute();
            header('Location: http://localhost/task1/login.html');
        }
    }

    require_once('./inc/header.php');
    ?>

    <section class="formContainer">
        <form action="register.php" name="register" method="POST">
            
        <h1>Welcom to ezoic inventory management System</h1>
            <input type="text" name="fullName"  placeholder="full Name" required>
            <input type="email" name="userEmail"  placeholder="userEmail" required>
            <?php
            if (isset($taken)) {
                echo "<span> <P> $taken </p></span>";
            } else {
                echo '';
            }
            ?>
            <input type="password" name="password" id="password" placeholder="password" required>
            <input type="password" name="confirmPassword" id="password" placeholder="confirmPassword" required>
            <?php
            if (isset($notMatched)) {
                echo "<span> <P> $notMatched </p></span>";
            } else {
                echo '';
            }
            ?>
            <label for="role">Account Type</label>
            <select type="text" name="role" id="role" required>
                <option value="Regular">Normal User</option>
                <option value="Admin">Administrator</option>
            </select> </br>
            <button name="register" type="submit" class="btn btn-primary">Register</button>
        </form>
    </section>

    <script src="script.js"></script>