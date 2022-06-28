<?php
   
    require_once('./inc/db.php');
    $assetId = $_GET['assetId'];
    $sql = "SELECT * FROM `assets` WHERE assets.assetId = $assetId";
    $stmt = $pdo->query($sql);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    print_r($rows);
    print($assetId);
    foreach($rows as $row){
        print_r($row);
    }
    // header('Location: http://localhost/task1/processAssignment.php');
?>


<?php
    require_once('./inc/header.html');
?>
 <form action="#">

    <h1><?= 'Assign: '. $row['assetBrand']. ' '.  $row['assetName'] ?></h1>
    
    <!-- asset information -->
    <?php 
    echo $assetId
    ?>
   
    <fieldset name="assetInformation" class="assetInfo">
        <legend>asset Detail</legend>
        
        <?= 'Asset Tag: '. $row['assetTag'] ?> <br>
        <?= 'Asset Serial Number: '. $row['assetSerialNumber']?> <br>
        <?= 'Asset Name: '. $row['assetTag'] ?> <br>
        <?= 'Asset Brand: '. $row['assetTag'] ?> <br>
        <?= 'Asset Status: '. $row['assetTag'] ?> <br>
        <?= 'Asset Assigned To: '. $row['assetAssignedTo'] ?> <br>        
    </fieldset>
    </form>
    <!-- ====================== user information ============================== -->
    <form action='processAssignment.php' name="assignAsset" id="assignAssetFrm" class="" method="POST">

<fieldset name="userInfo" class="userInfo">
    <legend>user information</legend>
       
    <?php ?>
    <label for="firstName">First Name</label>
    <input type="text" name="firstName">
    <label for="lastName">Last Name</label>
    <input type="text" name="lastName">
    <label for="emailAddress">Email Address</label>
    <input type="email" name="emailAddress">
    <label for="department">Department</label>
    <input type="text" name="department">
    <label for="location">Location</label>
    <select name="location" id="assetLocation">Location
        <option value="Newcastle">Newcastle</option>
        <option value="London">London</option>
    </select>

    <label for="issueDate">Issue Date</label>
    <input type="date">
    <label for="useCase">Use Case</label>
    <select name="useCase">
        <option value="homeUse">For Home</option>
        <option value="Office">For Office</option>
    </select>
   
    <input type="submit" name="assign" id="submit">

</fieldset>
</form>
   


