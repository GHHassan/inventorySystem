<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>letsDoIt</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<body>
    <main> 
    <?php
    session_start();
    if(isset($_SESSION['userId'])){
        session_destroy();
        header ("Location: http://localhost/task1/landingPage.php");
    }
    ?>  
</main> 

<script src="script.js"></script>
</body>
</html>



