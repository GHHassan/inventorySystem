<?php
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.html');
	exit;
}
require_once('./inc/dbcon.php');
// $assetId2 = $_GET['assetId'];
if(isset($_POST['assign'])) {

   if((isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['emailAddress']) && isset($_POST['department']) && isset($_POST['location']) && isset($_POST['issueDate']) && isset($_POST['useCase']))){
      $firstName = htmlspecialchars($_POST['firstName']);
      $lastName = htmlspecialchars($_POST['lastName']);
      $emailAddress = htmlspecialchars($_POST['emailAddress']);
      $department = htmlspecialchars($_POST['department']);
      $location = htmlspecialchars($_POST['location']);
      $issueDate = htmlspecialchars($_POST['issueDate']);
      $useCase = htmlspecialchars($_POST['useCase']);
      $assetId = htmlspecialchars($_POST['assetId']);
     
      $sql = "SELECT * FROM `staff` WHERE `staffFirstname` = '$firstName' AND `staffLastname` = '$lastName' AND `staffEmail` = '$emailAddress'";
      $stmt1 = $pdo->query($sql);
      $stmt1->execute();
      $result = $stmt1->fetch(PDO::FETCH_ASSOC);
      echo json_encode($result);
      ?>
      <script>
         alert('staff not found');
      </script>
      <?php
      if(!$result){
         
         echo (`<div class="warning">
         <pre>
         <p>the operation was unsuccess full</p>
         <p>please, check you that you have filled in correct detail on the form</p>
         <button class="--btn-primary--">home</button>
         <button class="--btn-primary--">back</button>
         </pre>
      </div>`);
      header('Location: http://localhost/task1/processAssignment.php'); 
      ?>
      <script>
         alert('staff not found');
      </script>
      <?php
      }else{
      $sqla = "UPDATE assets SET assetAssignedTo = '$emailAddress', assetAssignmentDate = '$issueDate'  WHERE assetId = $assetId";
      $stmta = $pdo->query($sqla);
      $stmta->execute();
      $update = $stmta->fetch(PDO::FETCH_ASSOC);
      echo("\n");
      echo(gettype($result));
      echo json_encode($result);
      }
      header('Location: http://localhost/task1/index.php'); 
   }
}
?>
