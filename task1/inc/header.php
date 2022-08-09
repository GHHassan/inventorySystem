<?php
// We need to use sessions, so you should always start sessions using the below code.
// session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>ezoic Inventory</title>
</head>
<?php
if(!$_SESSION['role']){
    echo "";
}else if($_SESSION['role'] === 'Admin'){
?>
    <button class="createUser">Create User</button>
<?php
}
?>

<body>

<header>
    <button class="float-right" id="logout">Logout</button>

    <h1>Dear <?php echo $_SESSION['name']; ?> Welcome to Ezoic Inventory management System<h1>
            <nav>
                <ul>
                    <li class="home"> <a href="index.php">Home</a></li>
                    <!-- <li type="li" class='nav' id="assignAsset">Assign Asset</li> -->
                    <li class="addAsset"> <a href="addAsset.php">Add Asset</a></li>
                    <!-- <li type="li" class='nav' id="retireAsset">Retired Assets</li> -->
                    <li class="addStaff"> <a href="addStaff.php"> Add Staff</a></li>
                    <li class="addDepartment"> <a href="addDepartment.php"> Add Department </a></li>
                    <!-- <li type="li" class='nav' id="releaseAsset">Release Asset</button> -->
                </ul>
                <input type="search" class='search' name="assetLookup" placeholder="Asset lookup">
                <input type="search" class='search' name="staffLookup" placeholder="Staff lookup">
            </nav>
</header>
<script src="script.js">
    
  </script>