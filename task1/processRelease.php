<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
require_once('./inc/dbcon.php');
$assetId = ($_GET['assetId']);
echo($assetId);
if (isset($_GET['confirmRelease'])) {
    if (isset($_GET['assetId'])) {
        echo ($assetId);
        $assetId = $_GET['assetId'];
        echo ($assetId);
        $sqla = "UPDATE assets SET assetAssignedTo = ' ', assetAssignmentDate= ' '  WHERE assetId = $assetId";
        $stmta = $pdo->query($sqla);
        $stmta->execute();
        $stmtrelease = $stmta->fetchAll(PDO::FETCH_ASSOC);
        header('Location: http://localhost/task1/index.php');
    }
}else{
    echo ('something went wrong, please contact your administrator');
}
?>