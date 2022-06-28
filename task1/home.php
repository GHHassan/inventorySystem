<?php
  // connecting to database and importing the header
 
  require_once('./inc/db.php');
  require_once('./inc/header.html');
  //SQL query to extract the toys detail from the database

  $sql = "SELECT COUNT(*) FROM assets;";
  $stmt = $pdo->query($sql);
  $stmt -> execute();
  

  // $result = $stmt->fetch

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
<div>
  <?php echo json_encode($rows) ?>
  <?php foreach ($rows as $item):?>
    <div class="assetBox" id="<?= $item['assetId'] ?>">
      <button type='button' class='nav' id="<?= "release". $item['assetId'] ?>">Release Asset</button>
      <button type="button" class='assign' id="<?= "assign" . $item['assetId'] ?>">Assign Asset</button>
      <button type="button" class='nav' id="<?= "retire" . $item['assetId'] ?>">Retire Assets</button>
      <h3> <?= $item['assetBrand'] . " " . $item['assetName']. " Tag number: " . $item['assetTag']?> </h3>
      <h3>Assigned to <?= $item['staffEmail'] . " " . $item['staffLastname'] ?><h3>
      <P> At: <?= $item['staffDepartment'] . " " . $item['staffLocation'] ?> </p>
      <p class="manName"> <?= $item['assetTag'] ?> </p>
      <p class="manName"><?= $item['assetSerialNumber'] ?>  </p>
      <p class="category"> <?= $item['assetStatus'] ?> </p>
      <p id="description"> <?= $item['assetDescription'] ?> </p>
      <p >Assigned on: <?= $item['assetAssignmentDate'] ?>  </p>
    </div>
  <?php endforeach; ?> 
</div>
<script>
  $(".assign").click(function(){
    let assetId = $(this).closest('div.assetBox').attr('id');
    console.log(assetId)
    var searchParams = new URLSearchParams(window.location.search);
    window.location.replace('http://localhost/task1/assignAsset.php?assetId='+assetId);
    
  });
</script>
<script>
  $("#releaseAsset").click(function(){
    window.location.replace('http://localhost/task1/releaseAsset.php');
    });

</script>