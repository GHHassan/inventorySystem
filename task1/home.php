<?php
// We need to use sessions, so you should always start sessions using the below code.
// session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
  header('Location: login.html');
  exit;
}
//SQL query to extract the toys detail from the database
require_once('./inc/dbcon.php');

$sql = "SELECT assetId, staffFirstname, staffLastname, staffEmail, staffDepartment, staffLocation, assetTag, assetSerialNumber,
   assetName, assetBrand, assetDescription, assetStatus, assetAssignedTo, assetAssignmentDate, assetPurchaseDate, assetPrice
    from assets left join 
    staff on assets.assetAssignedTo = staff.staffEmail 
    left join department on staff.staffDepartment = depId order by staffLastname";

// $stmt = $pdo->prepare($sql);
$stmt = $pdo->query($sql);
//fetching data from database
$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="assetContainer">
  <?php foreach ($rows as $item) : ?>
    <div class="assetBox" id="<?= $item['assetId'] ?>">
      <div class="buttonContainer">
        <button type='button' class='nav release' id="<?= "release" . $item['assetId'] ?>">Release Asset</button>
        <button type="button" class='nav assign' id="<?= "assign" . $item['assetId'] ?>">Assign Asset</button>
        <button type="button" class='nav retire' id="<?= "retire" . $item['assetId'] ?>">Retire Assets</button>
      </div>
      <h3> <?= $item['assetBrand'] . "  " . $item['assetName'] . "  " . $item['assetTag'] ?> </h3>
      <p><?= 'Serial Number: ' . $item['assetSerialNumber'] ?> </p>
      <h3>Assigned to <?= $item['staffEmail'] . "  " . $item['staffLastname'] ?><h3>
          <P> At: <?= $item['staffDepartment'] . "  Department " . $item['staffLocation'] ?> </p>
          <p class="status"> Status <?= $item['assetStatus'] ?> </p>
          <p id="description"> <?= $item['assetDescription'] . '  purchased on: ' . $item['assetPurchaseDate']?> </p>
          <p>Assigned on: <?= $item['assetAssignmentDate'] . '  Asset Price: ' . $item['assetPrice']?> </p>
    </div>
  <?php endforeach;
  ?>

  