<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}
if (isset($_POST['staffId'])) {
    // echo file_get_contents(SanitizeString('http://' .$_POST['url']));

    $staffId = sanitizeString($_POST['staffId']);
    $sql = "SELECT * FROM `staff` WHERE `staffId` LIKE '$staffId'";
    $stmt = $pdo->query($sql);
    //fetching data from database
    $row = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo $row;

    // echo SanitizeString($row);
    echo file_get_contents(SanitizeString('http://' . $_POST['url']));
}
function SanitizeString($input)
{
    $var = strip_tags($input);
    $var = htmlentities($input);
    return stripslashes($input);
}
