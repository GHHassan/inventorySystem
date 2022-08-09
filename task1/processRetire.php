<?php

session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.html');
    exit;
}

$assetId = ($_GET['assetId']);
// echo($assetId);
if (isset($_GET['confirmRetire'])) {
    if (isset($_GET['assetId'])) {
        require_once('./inc/dbcon.php');

        $sql = "SELECT * FROM assets WHERE assetId = $assetId";
        $stmt = $pdo->query($sql);
        $stmt->execute();
        $tobeRemoved = $stmt->fetch(PDO::FETCH_ASSOC);

        $sql1 ="INSERT INTO `retiredassets` (`assetTag`, `assetSerialNumber`, `assetName`, `assetBrand`, `assetDescription`, `assetLocation`, `assetStatus`, `assetAssignedTo`, `assetAssignmentDate`, `assetPurchaseDate`, `assetPrice`) VALUES (?,?,?,?,?,?,?,?,?,?,?)";
        $stmt1 = $pdo->prepare($sql1);
        echo ($array);
        $inserted =   $stmt1->execute(array($tobeRemoved['assetTag'], $tobeRemoved['assetSerialNumber'], $tobeRemoved['assetName'], $tobeRemoved['assetBrand'], $tobeRemoved['assetDescription'], $tobeRemoved['assetLocation'], $tobeRemoved['assetStatus'], $tobeRemoved['assetAssignedTo'] ,$tobeRemoved['assetAssignmentDate'] ,$tobeRemoved['assetPurchaseDate'] ,$tobeRemoved['assetPrice']));
        $sqla = "DELETE FROM assets WHERE assetId = $assetId";
        $stmta = $pdo->query($sqla);
        $removed = $stmta->execute();
        echo ('removed: ' . $removed);
        echo json_encode($removed);

        header('Location: http://localhost/task1/index.php');
    }
} else {
    echo ('something went wrong, please contact your administrator');
}
?>