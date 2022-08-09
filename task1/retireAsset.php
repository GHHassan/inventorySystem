<?php
    session_start();
    // If the user is not logged in redirect to the login page...
    if (!isset($_SESSION['loggedin'])) {
        header('Location: login.html');
        exit;
    }

    require_once('./inc/dbcon.php');
    require_once('./inc/header.php');
    $assetId = $_GET['assetId'];
    $sql = "SELECT * FROM `assets` WHERE assets.assetId = $assetId";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $row = $rows[0];
    
?>


<h1><?= 'Retire: '. $row['assetBrand']. ' '.  $row['assetName'] ?></h1>

<!-- asset information -->
<?php 
    // echo $assetId
    ?>
    <div class="formContainer">
<form method="GET" action="processRetire.php">
    <fieldset name="assetInformation" class="assetInfo">
        <legend>asset Detail</legend>
        <h2>Are you sure you want to release <?= $row['assetBrand']. ' '.  $row['assetName'] . ' Asset tag: '. $row['assetTag']. ' from: '. $row['assetAssignedTo'] ?></h2>
        <input hidden type="text" name="assetId" value="<?=$row['assetId'] ?>"> <br>
        <?= 'Asset Tag: '. $row['assetTag'] ?> <br>
        <?= 'Asset Serial Number: '. $row['assetSerialNumber']?> <br>
        <?= 'Asset Name: '. $row['assetName'] ?> <br>
        <?= 'Asset Brand: '. $row['assetBrand'] ?> <br>
        <?= 'Asset Status: '. $row['assetStatus'] ?> <br>
        <?= 'Asset Assigned To: '. $row['assetAssignedTo'] ?> <br>
        <button type="submit" name="confirmRetire">Retire</button>
    </fieldset>
</form>
</div>

<?php
    require_once('./inc/footer.php');
?>