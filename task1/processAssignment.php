
<?php
require_once('./inc/db.php');
// $assetId2 = $_GET['assetId'];

if(isset($_POST['firtName']) &&isset($_POST['lastname']) && isset($_POST['emailAddress'])
&& isset($_POST['issueDate'])){
$firstName = filter_var($_POST['firstName'], FILTER_SANITIZE_STRING);
$lastName = filter_var($_POST['lastName'], FILTER_SANITIZE_STRING);
$emailAddress = filter_var($_POST['emailAddress'], FILTER_SANITIZE_EMAIL);
$issueDate = filter_var($_POST['issueDate'], FILTER_SANITIZE_STRING);

//query the data base if the staff exist
$sql2 = "SELECT * FROM `staff` WHERE `staffFirstname` LIKE '$firstName' AND `staffLastname` LIKE '$lastName' AND `staffEmail` LIKE '$emailAddress' ";
$stmt1 = $pdo->query($sql2);
$stmt1->execute();
$staff = $stmt1->fetchAll(PDO::FETCH_ASSOC);

 if($staff['staffFirstname'] == $firstName && $staff['staffLastname'] == $lastName $staff['emailAddress'] == $emailAddress ) 
 {
    $sqla = "UPDATE assets SET assetAssignedTo = '$firstName', assetAssignmentDate= $issueDate  WHERE assetTag = $assetId";
    $stmta = $pdo->query($sqla);
    $stmta->execute();
 }
$stmtAssign = $stmta->fetchAll(PDO::FETCH_ASSOC);
echo "this is first name: ". "$firstName";
print_r($stmtAssign);


header('Location: http://localhost/task1/index.php'); 
if(!$staff){ echo "did not workd!";}
?>
<?php

echo "<div> '$firstName. ' '. $lastName. ' ' . $emailAddress. ' ' .$issueDate'  </div>";
}
?>

<?php 
// require_once('./assignAsset.php');
?>
