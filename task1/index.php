<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Home</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.js"></script>
</head>
<body>
    
<?php 
session_start();
    if(isset($_SESSION['userId'])){
    require_once('./inc/db.php');
    $userId = $_SESSION['userId'];
    
    $stmt = $pdo -> prepare("SELECT * FROM users WHERE id = ?");
    $stmt -> execute ([$userId]);

    $user = $stmt -> fetch();

    if($user -> role == 'guest'){
        $message = "your role is a guest";
    }
}
?>

<main>
    <a href="logout.php" id="logout">logout</a>
    <?php
        if(isset($user)){
            echo "<h1> Dear $user->name</h1>";
        }
    ?>
    
    <h1>Welcome to Ezoic Inventory management System<h1>
    <nav >
        <section class='btns'>
            <button type="button" class='nav' id="home">Home</button>
            <!-- <button type="button" class='nav' id="assignAsset">Assign Asset</button> -->
            <button type="button" class='nav' id="addAsset">Add Asset</button>
            <!-- <button type="button" class='nav' id="retireAsset">Retired Assets</button> -->
            <button type="button" class='nav' id="addStaff">Add Staff</button>
            <button type="button" class='nav' id="addDepartment">Add Department</button>
            <!-- <button type="button" class='nav' id="releaseAsset">Release Asset</button> -->
        </section>
        <input type="search" class='search' name="assetLookup" id="assetLookup" placeholder="Asset lookup">
        <input type="search" class='search' name="staffLookup" id="staffLookup" placeholder="Staff lookup">
    </nav>
<!-- ============================ show assets ====================================== -->

<?php
    require_once('./home.php');
    
?>

<!--================================== add new asset to the system ===================== -->

<?php
    require('./addAsset.php');
?>

<!-- ============================== Remove/retire an asset =================================== -->        

<?php
    require('./retiredAsset.php');
?>

<!-- ================ release Asset ================================================== -->

<?php
    require('./releaseAsset.php');
?>

<!-- =============================== add staff ======================================= -->
<?php
    require('./addStaff.php');
?>
<!-- ====================Add Departments =========================== -->  
<?php
    require('./addDepartment.php');
?>

</main>
<script src="script.js">
</script>
<script>
    $("#home").click(function(){
        $('.assetBox').show();
    });
</script>
</body>
</html>